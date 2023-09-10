<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EquipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('equipes')->truncate();

        DB::table('equipes')->insert([
            [
                'nom' => 'Equipe KMF',
                'leader_id' => 1,
            ]
        ]);

        DB::table('equipe_technicien')->truncate();

        DB::table('equipe_technicien')->insert([
            [
                'equipe_id' => 1,
                'technicien_id' => 1,
                'date_affectation' => today()->format('Y-m-d'),
            ],
            [
                'equipe_id' => 1,
                'technicien_id' => 2,
                'date_affectation' => today()->subDays(3)->format('Y-m-d'),
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
