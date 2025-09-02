<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class BrandingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
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

        $request->validate([
            'theme' => 'required|in:blue,teal,purple,coral,slate,custom',
            'primary_color'   => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
            'secondary_color' => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
            'accent_color'    => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
            'gradient_start'  => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
            'gradient_end'    => 'nullable|required_if:theme,custom|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        $company->update($request->only([
            'theme','primary_color','secondary_color','accent_color','gradient_start','gradient_end'
        ]));

        return back()->with('success', 'Branding updated.');
    }
}
