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

        $activeTheme = $company?->theme ?? 'blue';

        // Only push inline variables for 'custom' (presets come from theme.css [data-theme="..."])
        $customVars = '';
        if ($activeTheme === 'custom') {
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
            ];
            $customVars = collect($vars)->map(fn($v,$k)=>"$k: $v;")->implode(' ');
        }

        // Share with all views
        view()->share('activeTheme', $activeTheme);
        view()->share('activeThemeVars', $customVars);

        return $next($request);
    }
}
