<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Parameter;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accueil()
    {
        $nom_agence = Parameter::where('name', 'LIKE', 'nom_agence')->first()->value;
        $apropos_texte = Parameter::where('name', 'LIKE', 'apropos_texte')->first()->value;

        return view('front/accueil/index')
            ->with([
                'titre_page' => 'Tableau de bord',
                'nom_agence' => $nom_agence,
                'apropos_texte' => $apropos_texte,
            ]);
    }
}
