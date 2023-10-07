<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('parameters')->truncate();

        DB::table('parameters')->insert([
            [
                'name' => 'nom_agence',
                'value' => 'MS Travel',
            ],
            [
                'name' => 'apropos_texte',
                'value' => '
<p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
<p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
<div class="row gy-2 gx-4 mb-4">
    <div class="col-sm-6">
        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
    </div>
    <div class="col-sm-6">
        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Handpicked Hotels</p>
    </div>
    <div class="col-sm-6">
        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
    </div>
    <div class="col-sm-6">
        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
    </div>
    <div class="col-sm-6">
        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours</p>
    </div>
    <div class="col-sm-6">
        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
    </div>
</div>
',
            ],
            [
                'name' => 'service_icone_1',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_1',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_1',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'service_icone_2',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_2',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_2',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'service_icone_3',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_3',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_3',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'service_icone_4',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_4',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_4',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'service_icone_5',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_5',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_5',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'service_icone_6',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_6',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_6',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'service_icone_7',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_7',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_7',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'service_icone_8',
                'value' => 'tt',
            ],
            [
                'name' => 'service_titre_8',
                'value' => 'WorldWide Tours',
            ],
            [
                'name' => 'service_texte_8',
                'value' => 'Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam',
            ],
            [
                'name' => 'destination_promo_1',
                'value' => '',
            ],
            [
                'name' => 'destination_image_1',
                'value' => 'im',
            ],
            [
                'name' => 'destination_lieu_1',
                'value' => 'LIEU 1',
            ],
            [
                'name' => 'destination_promo_2',
                'value' => '',
            ],
            [
                'name' => 'destination_image_2',
                'value' => 'im',
            ],
            [
                'name' => 'destination_lieu_2',
                'value' => 'LIEU 2',
            ],
            [
                'name' => 'destination_promo_3',
                'value' => '',
            ],
            [
                'name' => 'destination_image_3',
                'value' => 'im',
            ],
            [
                'name' => 'destination_lieu_3',
                'value' => 'LIEU 3',
            ],
            [
                'name' => 'destination_promo_4',
                'value' => '',
            ],
            [
                'name' => 'destination_image_4',
                'value' => 'im',
            ],
            [
                'name' => 'destination_lieu_4',
                'value' => 'LIEU 4',
            ],
            [
                'name' => 'process_icone_1',
                'value' => 'ic',
            ],
            [
                'name' => 'process_titre_1',
                'value' => 'Choose A Destination',
            ],
            [
                'name' => 'process_texte_1',
                'value' => 'Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum et lorem et sit sed stet lorem sit',
            ],
            [
                'name' => 'process_icone_2',
                'value' => 'ic',
            ],
            [
                'name' => 'process_titre_2',
                'value' => 'Choose A Destination',
            ],
            [
                'name' => 'process_texte_2',
                'value' => 'Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum et lorem et sit sed stet lorem sit',
            ],
            [
                'name' => 'process_icone_3',
                'value' => 'ic',
            ],
            [
                'name' => 'process_titre_3',
                'value' => 'Choose A Destination',
            ],
            [
                'name' => 'process_texte_3',
                'value' => 'Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum et lorem et sit sed stet lorem sit',
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
