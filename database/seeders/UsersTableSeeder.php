<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'prenom' => 'Alioune Badara',
                'nom' => 'Dia',
                'email' => 'admin@local.com',
                'password' => Hash::make('adminpass'),
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
