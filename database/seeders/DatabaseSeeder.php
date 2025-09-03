<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // If you have AdminUserSeeder, put it first.
        $this->call([
            AdminUserSeeder::class,
            CompanySeeder::class,
            TemplatesSeeder::class,
        ]);
    }
}
