<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TemplatesController extends Controller
{
    public function index()
    {
        // Template data for the gallery
        $templates = [
            'pages' => [
                [
                    'name'        => 'Page Template',
                    'description' => 'Basic page layout with header, content, and actions',
                    'icon'        => '📄',
                    'category'    => 'Layout',
                    'route'       => 'admin.templates.page-template',
                ],
                [
                    'name'        => 'Simple Page',
                    'description' => 'Minimal page template for quick development',
                    'icon'        => '📝',
                    'category'    => 'Layout',
                    'route'       => 'admin.templates.simple-page',
                ],
                [
                    'name'        => 'Form Page',
                    'description' => 'Complete form layout with validation styling',
                    'icon'        => '📋',
                    'category'    => 'Forms',
                    'route'       => 'admin.templates.form-page',
                ],
                [
                    'name'        => 'Table Page',
                    'description' => 'Data table with sorting, filtering, and actions',
                    'icon'        => '📊',
                    'category'    => 'Data',
                    'route'       => 'admin.templates.table-page',
                ],
                [
                    'name'        => 'Dashboard Page',
                    'description' => 'Executive dashboard with widgets and charts',
                    'icon'        => '📈',
                    'category'    => 'Dashboard',
                    'route'       => 'admin.templates.dashboard-page',
                ],
            ],
            'components' => [
                [
                    'name'        => 'Cards',
                    'description' => 'Various card layouts and styles',
                    'icon'        => '🃏',
                    'route'       => 'admin.templates.components.cards',
                ],
                [
                    'name'        => 'Forms',
                    'description' => 'Form controls and layouts',
                    'icon'        => '📝',
                    'route'       => 'admin.templates.components.forms',
                ],
                [
                    'name'        => 'Buttons',
                    'description' => 'Button styles and states',
                    'icon'        => '🔘',
                    'route'       => 'admin.templates.components.buttons',
                ],
                [
                    'name'        => 'Tables',
                    'description' => 'Table components and features',
                    'icon'        => '📋',
                    'route'       => 'admin.templates.components.tables',
                ],
            ],
        ];

        return view('admin.templates.index', compact('templates'));
    }
}
