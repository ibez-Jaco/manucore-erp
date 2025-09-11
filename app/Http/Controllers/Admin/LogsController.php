<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LogsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('role:Admin');
    }

    public function index(Request $request)
    {
        $base = $this->logsBase();
        $files = collect(File::files($base))
            ->filter(fn($f) => preg_match('/\.(log|txt|gz)$/i', $f->getFilename()))
            ->map(function ($f) {
                return [
                    'name'       => $f->getFilename(),
                    'path'       => $f->getPathname(),
                    'size'       => $f->getSize(),
                    'modified'   => $f->getMTime(),
                    'compressed' => str_ends_with($f->getFilename(), '.gz'),
                ];
            })
            ->sortByDesc('modified')
            ->values();

        // Default file to show actions for:
        $active = $request->get('file', 'laravel.log');

        return view('admin.logs.index', [
            'files'      => $files,
            'activeFile' => $active,
            'baseUrl'    => route('admin.logs'), // keeps sidebar highlight working
            'breadcrumbs' => [
                ['label' => 'Administration', 'url' => route('admin.index')],
                ['label' => 'Audit Logs', 'url' => null],
            ],
        ]);
    }

    public function tail(Request $request)
    {
        $file  = (string) $request->query('file', 'laravel.log');
        $lines = (int) $request->query('lines', 200);
        $path  = $this->resolveLogPath($file);

        abort_unless(File::exists($path), 404, 'Log file not found.');

        $output = $this->tailFile($path, $lines);

        return response($output, 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }

    public function download(Request $request)
    {
        $file = (string) $request->query('file', 'laravel.log');
        $path = $this->resolveLogPath($file);

        abort_unless(File::exists($path), 404, 'Log file not found.');

        return new StreamedResponse(function () use ($path) {
            $stream = fopen($path, 'rb');
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Content-Type'        => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="'.basename($path).'"',
        ]);
    }

    public function purge(Request $request)
    {
        $request->validate([
            'file' => ['required', 'string'],
        ]);

        $path = $this->resolveLogPath($request->input('file'));

        // Truncate or create empty if missing.
        File::put($path, '');

        // sane perms
        @chmod($path, 0664);

        return back()->with('success', 'Log purged: '.basename($path));
    }

    public function rotate(Request $request)
    {
        $request->validate([
            'file' => ['required', 'string'],
        ]);

        $src  = $this->resolveLogPath($request->input('file'));
        $base = $this->logsBase();

        if (! File::exists($src)) {
            // If it doesn't exist, just create a fresh empty log
            File::put($src, '');
            @chmod($src, 0664);
            return back()->with('warning', 'Source log did not exist. Created a fresh empty file.');
        }

        $ts   = now()->format('Ymd-His');
        $dst  = $base.'/archive';
        File::ensureDirectoryExists($dst, 0775, true);

        $target = $dst.'/'.basename($src, '.log')."-{$ts}.log";
        File::move($src, $target);
        @chmod($target, 0664);

        // Recreate the active file so Laravel/Horizon can keep writing
        File::put($src, '');
        @chmod($src, 0664);

        return back()->with('success', 'Log rotated: '.basename($target));
    }

    // ---------- helpers ----------

    private function logsBase(): string
    {
        return storage_path('logs');
    }

    private function resolveLogPath(string $file): string
    {
        // normalize and prevent path traversal
        $file = trim($file);
        $file = ltrim($file, '/\\');

        $base = realpath($this->logsBase()) ?: $this->logsBase();
        $path = $base.'/'.$file;

        // If it's a gz or txt allow, else default to .log
        if (!preg_match('/\.(log|txt|gz)$/i', $path)) {
            $path .= '.log';
        }

        // Ensure it's still under storage/logs
        $realBase = realpath($base) ?: $base;
        $realPath = realpath(dirname($path));
        if ($realPath && !str_starts_with($realPath, $realBase)) {
            abort(403, 'Invalid log path.');
        }

        return $path;
    }

    private function tailFile(string $path, int $lines = 200): string
    {
        // Use PHP fallback to avoid relying on shell tools
        $buffer = '';
        $f = @fopen($path, 'rb');
        if (!$f) {
            return '';
        }

        $chunkSize = 4096;
        $pos = -1;
        $lineCount = 0;
        $stat = fstat($f);
        $size = $stat['size'] ?? 0;

        if ($size === 0) {
            fclose($f);
            return '';
        }

        $pos = -1;
        $output = '';

        while ($lineCount < $lines) {
            $seek = $pos * $chunkSize;
            if (abs($seek) >= $size) {
                fseek($f, 0);
                $chunk = fread($f, $chunkSize);
                $output = $chunk . $output;
                break;
            } else {
                fseek($f, $seek, SEEK_END);
                $chunk = fread($f, $chunkSize);
                $output = $chunk . $output;
                $pos--;
            }
            $lineCount = substr_count($output, "\n");
            if ($lineCount >= $lines) {
                break;
            }
        }

        fclose($f);

        $linesArr = explode("\n", $output);
        $linesArr = array_slice($linesArr, -$lines);

        return implode("\n", $linesArr);
    }
}
