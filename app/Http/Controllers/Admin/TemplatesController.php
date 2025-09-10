<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function index()
    {
        // Template data for the gallery
        $templates = [
            'pages' => [
                [
                    'name' => 'Page Template',
                    'description' => 'Basic page layout with header, content, and actions',
                    'icon' => '📄',
                    'category' => 'Layout',
                    'route' => 'templates.page-template'
                ],
                [
                    'name' => 'Simple Page',
                    'description' => 'Minimal page template for quick development',
                    'icon' => '📝',
                    'category' => 'Layout',
                    'route' => 'templates.simple-page'
                ],
                [
                    'name' => 'Form Page',
                    'description' => 'Complete form layout with validation styling',
                    'icon' => '📋',
                    'category' => 'Forms',
                    'route' => 'templates.form-page'
                ],
                [
                    'name' => 'Table Page',
                    'description' => 'Data table with sorting, filtering, and actions',
                    'icon' => '📊',
                    'category' => 'Data',
                    'route' => 'templates.table-page'
                ],
                [
                    'name' => 'Dashboard Page',
                    'description' => 'Executive dashboard with widgets and charts',
                    'icon' => '📈',
                    'category' => 'Dashboard',
                    'route' => 'templates.dashboard-page'
                ]
            ],
            'components' => [
                [
                    'name' => 'Cards',
                    'description' => 'Various card layouts and styles',
                    'icon' => '🃏',
                    'route' => 'templates.components.cards'
                ],
                [
                    'name' => 'Forms',
                    'description' => 'Form controls and layouts',
                    'icon' => '📝',
                    'route' => 'templates.components.forms'
                ],
                [
                    'name' => 'Buttons',
                    'description' => 'Button styles and states',
                    'icon' => '🔘',
                    'route' => 'templates.components.buttons'
                ],
                [
                    'name' => 'Tables',
                    'description' => 'Table components and features',
                    'icon' => '📋',
                    'route' => 'templates.components.tables'
                ]
            ]
        ];

        return view('admin.templates.index', compact('templates'));
    }
}