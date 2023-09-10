<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
        return view('front/accueil')
            ->with([
                'titre_page' => 'Tableau de bord'
            ]);
    }
}
