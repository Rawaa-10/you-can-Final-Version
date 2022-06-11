<?php

namespace Database\Seeders;

use App\Models\Advs;
use Illuminate\Database\Seeder;

class AdvsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advs::factory(30)->create();
    }
}
