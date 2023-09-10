<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Http\Requests\StoreEquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Models\Technicien;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Request;
class EquipeController extends Controller
{

    protected $route = 'equipes';
    protected $form = 'equipe_form';
    protected $show = 'equipe_show';
    protected $permission = 'équipes';

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

        $table_headers = ['Nom', 'Chef d\'équipe', 'Techniciens','Actions'];
        $table_columns = ['nom', 'nom_leader', 'liste_techniciens'];

        $techniciens = Technicien::get()->pluck('nom_contact', 'id')->all();

        return view('pages.index')
        ->with([
            'titre_page' => 'Liste des équipes',
            'btn_ajout' => 'Ajouter une équipe',
            'liste' => Equipe::all(),
            'table_headers' => $table_headers,
            'table_columns' => $table_columns,
            'route' => $this->route,
            'form' => $this->form,
            'show' => $this->show,
            'permission' => $this->permission,
            'techniciens' => $techniciens,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEquipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipeRequest $request)
    {
        if (!hasPermission('Ajouter '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $equipe = Equipe::create($request->validated());
        $equipe->techniciens()->attach($request->validated()['technicien_id']);

        return Redirect::route($this->route.'.index')->with('success_msg', 'Ajout effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        if (!hasPermission('Afficher '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        return $equipe->only(['nom', 'techniciens', 'nom_contact_leader', 'leader_id']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipeRequest  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipeRequest $request, Equipe $equipe)
    {
        if (!hasPermission('Modifier '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $equipe->update($request->validated());
        $equipe->techniciens()->detach();
        $equipe->techniciens()->attach($request->validated()['technicien_id']);

        return Redirect::route($this->route.'.index')->with('success_msg', 'Modification effectuée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        if (!hasPermission('Supprimer '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        try {
            $equipe->delete();

            return Redirect::route($this->route.'.index')->with('success_msg', 'Suppression effectuée avec succès.');
        }
        catch (QueryException $e) {
            return Redirect::route($this->route.'.index')->with('error_msg', 'Erreur lors de la suppression de cet enregistrement.');
        }
    }
}
