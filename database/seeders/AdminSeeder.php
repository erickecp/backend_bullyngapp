<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = [
            'user_name'=>'admin1',
            'password'=>bcrypt('Password1'),
        ];

        Admin::insert($Admin);
    }
}
