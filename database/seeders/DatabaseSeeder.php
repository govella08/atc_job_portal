<?php

namespace Database\Seeders;

//use App\Models\Role;
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
        \App\Models\Category::factory(20)->create();
        \App\Models\Employer::factory(3)->create();
        \App\Models\Role::factory(3)->create();
    }
}