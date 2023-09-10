<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use App\Http\Requests\StoreTechnicienRequest;
use App\Http\Requests\UpdateTechnicienRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Request;

class TechnicienController extends Controller
{
    protected $route = 'techniciens';
    protected $form = 'technicien_form';
    protected $show = 'technicien_show';
    protected $permission = 'techniciens';

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

        $table_headers = ['Prénom', 'Nom','Adresse','Email', 'Téléphone 1', 'Téléphone 2',  'Actions'];
        $table_columns = ['prenom', 'nom','adresse','email', 'tel1', 'tel2'];
        
        return view('pages.index')
        ->with([
            'titre_page' => 'Liste des techniciens',
            'btn_ajout' => 'Ajouter un technicien',
            'liste' => Technicien::all(),
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
     * @param  \App\Http\Requests\StoreTechnicienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnicienRequest $request)
    {
        if (!hasPermission('Ajouter '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        Technicien::create($request->validated());

        return Redirect::route($this->route.'.index')->with('success_msg', 'Ajout effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technicien  $technicien
     * @return \Illuminate\Http\Response
     */
    public function show(Technicien $technicien)
    {
        if (!hasPermission('Afficher '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        return $technicien->only(['prenom', 'nom', 'adresse','email','tel1', 'tel2']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnicienRequest  $request
     * @param  \App\Models\Technicien  $technicien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnicienRequest $request, Technicien $technicien)
    {
        if (!hasPermission('Modifier '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $technicien->update($request->validated());

        return Redirect::route($this->route.'.index')->with('success_msg', 'Modification effectuée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technicien  $technicien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technicien $technicien)
    {
        if (!hasPermission('Supprimer '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        try {
            $technicien->delete();

            return Redirect::route($this->route.'.index')->with('success_msg', 'Suppression effectuée avec succès.');
        }
        catch (QueryException $e) {
            return Redirect::route($this->route.'.index')->with('error_msg', 'Erreur lors de la suppression de cet enregistrement.');
        }
    }
}
