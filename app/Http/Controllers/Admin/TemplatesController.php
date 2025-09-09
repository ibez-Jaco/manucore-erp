<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TemplatesController extends Controller
{
    /**
     * Show the Admin Templates index.
     */
    public function index(): View
    {
        // If you need data later, pass compact('vars') here
        return view('admin.templates.index');
    }
}
