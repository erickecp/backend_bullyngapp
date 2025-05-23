<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $School = [
            'school_name'=>'UTVCO',
            'key_school'=>'123XD',
            'kind_school'=>'publica',
            'password'=>bcrypt('Password1'),
            'admin_id'=>1,
        ];

        School::insert($School);
    }
}
