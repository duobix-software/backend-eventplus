<?php

namespace Duobix\Installer\Database\Seeders\Category;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CategoryTableSeeder::class);
    }
}
