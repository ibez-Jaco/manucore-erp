<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Branch;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('role:Admin|SettingsManager');
    }

    /** Settings overview dashboard */
    public function index()
    {
        return view('settings.index');
    }

    /** Company view */
    public function company()
    {
        $company = Company::main()->first() ?? Company::first();
        return view('settings.company.index', compact('company'));
    }

    /** Branch list view */
    public function branches()
    {
        $branches = Branch::with('company')->orderBy('is_head_office','desc')->orderBy('name')->get();
        return view('settings.branches.index', compact('branches'));
    }

    // … keep your existing edit/update/etc. methods if you already added them earlier
}
