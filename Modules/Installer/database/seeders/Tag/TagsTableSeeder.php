<?php

namespace Duobix\Installer\Database\Seeders\Tag;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->delete();

        DB::table('tags')->insert([
            [
                'id' => 1,
                'name' => 'Music',
            ],
            [
                'id' => 2,
                'name' => 'Business',
            ],
            [
                'id' => 3,
                'name' => 'Technology',
            ],
            [
                'id' => 4,
                'name' => 'Art',
            ],
            [
                'id' => 5,
                'name' => 'Education',
            ],
            [
                'id' => 6,
                'name' => 'Health',
            ],
            [
                'id' => 7,
                'name' => 'Entertainment',
            ],
            [
                'id' => 8,
                'name' => 'Sports',
            ],
            [
                'id' => 9,
                'name' => 'Travel',
            ],
            [
                'id' => 10,
                'name' => 'Networking',
            ],
            [
                'id' => 11,
                'name' => 'Startup',
            ],
            [
                'id' => 12,
                'name' => 'Finance',
            ],
            [
                'id' => 13,
                'name' => 'Marketing',
            ],
            [
                'id' => 14,
                'name' => 'Science',
            ],
            [
                'id' => 15,
                'name' => 'Fitness',
            ],
            [
                'id' => 16,
                'name' => 'Wellness',
            ],
            [
                'id' => 17,
                'name' => 'Fashion',
            ],
            [
                'id' => 18,
                'name' => 'Photography',
            ],
            [
                'id' => 19,
                'name' => 'Cinema',
            ],
            [
                'id' => 20,
                'name' => 'Social',
            ],
            [
                'id' => 21,
                'name' => 'Gaming',
            ],
            [
                'id' => 22,
                'name' => 'Coding',
            ],
            [
                'id' => 23,
                'name' => 'Sustainability',
            ],
            [
                'id' => 24,
                'name' => 'Environment',
            ],
            [
                'id' => 25,
                'name' => 'History',
            ],
            [
                'id' => 26,
                'name' => 'Cooking',
            ],
            [
                'id' => 27,
                'name' => 'Writing',
            ],
            [
                'id' => 28,
                'name' => 'Psychology',
            ],
            [
                'id' => 29,
                'name' => 'Politics',
            ],
            [
                'id' => 30,
                'name' => 'Architecture',
            ],
            [
                'id' => 31,
                'name' => 'Literature',
            ],
            [
                'id' => 32,
                'name' => 'Biology',
            ],
            [
                'id' => 33,
                'name' => 'Philosophy',
            ],
            [
                'id' => 34,
                'name' => 'Economics',
            ],
            [
                'id' => 35,
                'name' => 'Astronomy',
            ],
            [
                'id' => 36,
                'name' => 'Mathematics',
            ],
            [
                'id' => 37,
                'name' => 'Physics',
            ],
            [
                'id' => 38,
                'name' => 'Robotics',
            ],
            [
                'id' => 39,
                'name' => 'Artificial Intelligence',
            ],
            [
                'id' => 40,
                'name' => 'Astrophysics',
            ]
        ]);
    }
}
