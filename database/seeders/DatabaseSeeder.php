<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $user = \App\Models\User::factory()->create();

        for ($i = 0; $i < 40; $i++) {
            $user->categories()->create([
                'name' => $faker->name()
            ]);
        }
    }
}
