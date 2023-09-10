<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TechniciensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('techniciens')->truncate();

        DB::table('techniciens')->insert([
            [
                'prenom' => 'Babacar',
                'nom' => 'Dia',
                'adresse' => 'Mbao',
                'email' => 'babacar@galimatech.com',
                'tel1' => '771112233',
            ],[
                'prenom' => 'Opa',
                'nom' => 'Mbaye',
                'adresse' => 'Keur Mbaye Fall',
                'email' => 'opa@galimatech.com',
                'tel1' => '770004455',
            ]
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
