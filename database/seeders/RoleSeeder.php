<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a role with the name 'admin'
        \App\Models\Role::create([
            'name' => 'admin',
        ]);

        \App\Models\Role::create([
            'name' => 'author',
        ]);

        // Create a role with the name 'user'
        \App\Models\Role::create([
            'name' => 'reader',
        ]);
    }
}
