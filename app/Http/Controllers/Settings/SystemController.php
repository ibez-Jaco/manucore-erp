<?php
namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('role:Admin|SettingsManager');
    }

    public function index()
    {
        return view('settings.system.index')->with([
            'breadcrumbs' => [
                ['label' => 'Settings', 'url' => route('settings.index')],
                ['label' => 'System Configuration', 'url' => null]
            ]
        ]);
    }
}