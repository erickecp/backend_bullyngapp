<?php

namespace Database\Seeders;

use App\Models\schoolUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SchoolUser = [
            [
                'user_name'=>'Moi',
                'password'=>bcrypt('Password1'),
                'school_id'=>'1',
            ],
            [
                'user_name'=>'Adrian',
                'password'=>bcrypt('Password2'),
                'school_id'=>'1',
            ],
            [
                'user_name'=>'Pancho',
                'password'=>bcrypt('Password3'),
                'school_id'=>'1',
            ],
            
        ];

        schoolUser::insert($SchoolUser);
    }
}
