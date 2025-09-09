<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandingController extends Controller
{
    public function __construct()
    {
        // Guards (Laravel 12: ok to call $this->middleware() here)
        $this->middleware(['auth', 'verified']);
        $this->middleware('role:Admin|SettingsManager');
    }

    public function edit()
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404, 'No company found. Seed or create a company first.');

        return view('settings.branding.edit', compact('company'));
    }

    public function update(Request $request)
{
    $company = Company::getMain() ?? Company::first();
    abort_if(!$company, 404, 'No company found.');

    // Normalize legacy theme names to new professional accents
    $themeNormalization = [
        'teal'  => 'green',
        'coral' => 'orange', 
        'slate' => 'blue',
    ];
    
    if ($request->has('theme')) {
        $theme = strtolower((string) $request->input('theme'));
        $request->merge(['theme' => $themeNormalization[$theme] ?? $theme]);
    }

    $validated = $request->validate([
        'theme'           => ['required', Rule::in(['blue','green','purple','orange','custom'])],
        'primary_color'   => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
        'secondary_color' => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
        'accent_color'    => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
        'gradient_start'  => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
        'gradient_end'    => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
    ]);

    $company->update($validated);

    return back()->with('success', 'Branding updated successfully.');
}

    public function uploadLogo(Request $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404, 'No company found.');

        $validated = $request->validate([
            'logo_type' => ['required', Rule::in(['logo-full-color','logo-white','logo-black','logo-icon','favicon'])],
            'logo_file' => ['required', 'file', 'max:4096', 'mimes:png,jpg,jpeg,svg,ico'],
        ]);

        $logoType = $validated['logo_type'];

        // Replace existing media in this collection
        $company->clearMediaCollection($logoType);
        $media = $company->addMediaFromRequest('logo_file')->toMediaCollection($logoType);

        // Update convenience URL column (e.g. logo-full-color -> logo_full_color)
        $field = str_replace('-', '_', $logoType);
        $company->update([$field => $media->getUrl()]);

        return back()->with('success', 'Logo uploaded.');
    }

    public function removeLogo(Request $request)
    {
        $company = Company::getMain() ?? Company::first();
        abort_if(!$company, 404, 'No company found.');

        $validated = $request->validate([
            'logo_type' => ['required', Rule::in(['logo-full-color','logo-white','logo-black','logo-icon','favicon'])],
        ]);

        $logoType = $validated['logo_type'];
        $company->clearMediaCollection($logoType);

        $field = str_replace('-', '_', $logoType);
        $company->update([$field => null]);

        return back()->with('success', 'Logo removed.');
    }
}
