<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreEquipementRequest;
use App\Http\Requests\UpdateEquipementRequest;

class EquipementController extends Controller
{

    protected $route = 'equipements';
    protected $form = 'equipement_form';
    protected $show = 'equipement_show';
    protected $permission = 'équipements';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!hasPermission('Afficher '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $table_headers = ['Nom d\'équipement', 'Type d\'équipement','Actions'];
        $table_columns = ['nom_equipement', 'type_equipement'];

       // $techniciens = Technicien::get()->pluck('nom_contact', 'id')->all();

        return view('pages.index')
        ->with([
            'titre_page' => 'Liste des équipements',
            'btn_ajout' => 'Ajouter un équipement',
            'liste' => Equipement::all(),
            'table_headers' => $table_headers,
            'table_columns' => $table_columns,
            'route' => $this->route,
            'form' => $this->form,
            'show' => $this->show,
            'permission' => $this->permission,
         
        ]);
       
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreEquipementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipementRequest $request)
    {
        if (!hasPermission('Ajouter '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }
         Equipement::create($request->validated());

        return Redirect::route($this->route.'.index')->with('success_msg', 'Ajout effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipement $equipement
     * @return \Illuminate\Http\Response
     */
    public function show(Equipement $equipement)
    {
        if (!hasPermission('Afficher '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        return $equipement->only(['nom_equipement', 'type_equipement']);
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipement $equipement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipementRequest $request, Equipement $equipement)
    {
        if (!hasPermission('Modifier '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $equipement->update($request->validated());

        return Redirect::route($this->route.'.index')->with('success_msg', 'Modification effectuée avec succès.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipement  $equipement)
    {
        if (!hasPermission('Supprimer '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        try {
            $equipement->delete();

            return Redirect::route($this->route.'.index')->with('success_msg', 'Suppression effectuée avec succès.');
        }
        catch (QueryException $e) {
            return Redirect::route($this->route.'.index')->with('error_msg', 'Erreur lors de la suppression de cet enregistrement.');
        }
    }
}
