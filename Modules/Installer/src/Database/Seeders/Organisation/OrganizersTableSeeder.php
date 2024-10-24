<?php

namespace Duobix\Installer\Database\Seeders\Organisation;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizers')->delete();

        DB::table('organisation_organizer')->delete();

        $now = now();
        $password = bcrypt('password');
        $index = 1;

        foreach (DB::table('organisations')->get(['id', 'website']) as $organisation) {
            $name = fake()->name();
            $email = Str::slug($name, '.') . '@' . parse_url($organisation->website)['host'];

            DB::table('organizers')->insert([
                'id' => $index,
                'fullname' => $name,
                'phone' => fake()->phoneNumber(),
                'email' => $email,
                'username' => strstr($email, '@', true),
                'password' => $password,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('organisation_organizer')->insert([
                'organisation_id' => $organisation->id,
                'organizer_id' => $index,
                'updated_at' => $now,
                'created_at' => $now,
            ]);

            $index++;
        }
    }
}
