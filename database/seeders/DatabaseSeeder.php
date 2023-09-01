<?php

use Database\Seeders\ConfigSeeder;
use Database\Seeders\DummySeeder;
use Database\Seeders\SpotenSeeder;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ConfigSeeder::class);

        if (App::Environment() === 'production') $this->call(SpotenSeeder::class);
        // Load local seeder
        else $this->call(DummySeeder::class);
    }
}
