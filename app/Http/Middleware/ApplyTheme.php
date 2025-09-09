<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyTheme
{
    public function handle(Request $request, Closure $next): Response
    {
        // Try main active company, then first, then null
        $company = Company::getMain() ?? Company::first();

        $rawTheme = strtolower((string) ($company?->theme ?? 'blue'));

        // Map legacy theme names to new accent system
        $accentMap = [
            'blue'   => 'blue',
            'green'  => 'green', 
            'purple' => 'purple',
            'orange' => 'orange',
            'custom' => 'custom',
            // Legacy mappings
            'teal'   => 'green',
            'coral'  => 'orange', 
            'slate'  => 'blue',
        ];

        $activeAccent = $accentMap[$rawTheme] ?? 'blue';

        // Only push inline variables for 'custom'
        $customVars = '';
        if ($activeAccent === 'custom') {
            $p1 = $company->primary_color   ?: '#2171b5';
            $p2 = $company->secondary_color ?: '#6baed6';
            $p3 = $company->accent_color    ?: '#bdd7e7';
            $gs = $company->gradient_start  ?: $p1;
            $ge = $company->gradient_end    ?: $p2;

            $vars = [
                '--primary-1' => $p1,
                '--primary-2' => $p2,
                '--primary-3' => $p3,
                '--gradient-start' => $gs,
                '--gradient-end' => $ge,
                // Brand tokens for new system
                '--brand-500' => $p1,
                '--brand-600' => $p2,
                '--brand-400' => $p3,
            ];
            $customVars = collect($vars)->map(fn($v,$k)=>"$k: $v;")->implode(' ');
        }

        // Share with all views (both old and new variable names)
        view()->share('activeTheme', $rawTheme);        // Keep for backward compatibility
        view()->share('activeAccent', $activeAccent);   // New accent system
        view()->share('activeThemeVars', $customVars);

        return $next($request);
    }
}