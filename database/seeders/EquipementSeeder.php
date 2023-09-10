<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class EquipementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('equipements')->truncate();

        DB::table('equipements')->insert(
            [
                [
                    'nom_equipement'=>'Bidons essences', 
                    'type_equipement'=>'Carburant',            
                ],
                [
                    'nom_equipement'=>'Panneau danger', 
                    'type_equipement'=>'Alert',      
                ],
                [
                    'nom_equipement'=>'Coffret clé', 
                    'type_equipement'=>'Maintenance',  
                ]
            ]);

        Schema::enableForeignKeyConstraints();
    }
}
