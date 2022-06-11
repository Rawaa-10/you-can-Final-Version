<?php

namespace Database\Seeders;

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
        ///here i put all seeder i create it
        $this->call(UserSeeder::class);
        $this->call(AdvsSeeder::class);
    }
}
