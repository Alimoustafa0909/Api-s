<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'ali',
            'email' => 'admin@example.com',
            'phone' => '01227942699',
            'password' => Hash::make('password123'),
            // Add other admin attributes as needed
        ]);
    }
}
