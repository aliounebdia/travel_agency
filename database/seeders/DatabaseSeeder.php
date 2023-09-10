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
        $this->call([
            UsersTableSeeder::class,
            PermissionsSeeder::class,
//            TechniciensTableSeeder::class,
//            EquipesTableSeeder::class,
//            EquipementSeeder::class,
        ]);
    }
}
