<?php

namespace App\Http\Controllers;

use App\Models\ParcAuto;
use App\Http\Requests\StoreParcAutoRequest;
use App\Http\Requests\UpdateParcAutoRequest;
use App\Models\Equipement;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class ParcAutoController extends Controller
{

    protected $route = 'parc_autos';
    protected $form = 'parc_auto_form';
    protected $show = 'parc_auto_show';
    protected $permission = 'véhicules';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!hasPermission('Afficher ' . $this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $table_headers = ['Marque', 'Modèle', 'Immatriculation', 'Numéro de chassis', 'Kilométrage', 'Date d\'immatriculation', 'Equipement(s) véhicule', 'Actions'];
        $table_columns = ['marque', 'modele', 'immatriculation', 'numchassi', 'kilometrage', 'dateimmat', 'equipement'];

        $equipements = Equipement::get()->pluck('nom_equipement', 'id')->all();
        return view('pages.index')
            ->with([
                'titre_page' => 'Parc automobile',
                'btn_ajout' => 'Ajouter un véhicule',
                'liste' => ParcAuto::all(),
                'photo' => '',
                'table_headers' => $table_headers,
                'table_columns' => $table_columns,
                'route' => $this->route,
                'form' => $this->form,
                'show' => $this->show,
                'permission' => $this->permission,
                'equipements' => $equipements,

            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParcAutoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParcAutoRequest $request)
    {
        if (!hasPermission('Ajouter ' . $this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $photo = time() . '.' . request()->photo->getClientOriginalName();
            request()->photo->move(public_path('photos'), $photo);
            $data['photo'] = asset('photos') . '/' . $photo;
        }

        $equipement = Request::input('equipement_id');
        $data['equipement'] = implode(',', $equipement);
        ParcAuto::create($data);
        return Redirect::route($this->route . '.index')->with('success_msg', 'Ajout éffectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParcAuto $parcAuto
     * @return \Illuminate\Http\Response
     */
    public function show(ParcAuto $parcAuto)
    {
        if (!hasPermission('Afficher ' . $this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        return $parcAuto->only(['marque', 'modele', 'immatriculation', 'numchassi', 'couleur', 'kilometrage', 'dateimmat', 'photo', 'equipement']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParcAutoRequest $request
     * @param  \App\Models\ParcAuto $parcAuto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParcAutoRequest $request, ParcAuto $parcAuto)
    {
        if (!hasPermission('Modifier ' . $this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $data = $request->validated();
        if (isset($data['photo_delete']) && $data['photo_delete'] == 1) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $photo = time() . '.' . request()->photo->getClientOriginalName();
            request()->photo->move(public_path('photos'), $photo);
            $data['photo'] = asset('photos') . '/' . $photo;
        }

        $equipement = Request::input('equipement_id');
        $data['equipement'] = implode(',', $equipement);
        $parcAuto->update($data);

        return Redirect::route($this->route . '.index')->with('success_msg', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParcAuto $parcAuto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParcAuto $parcAuto)
    {
        if (!hasPermission('Supprimer ' . $this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        try {
            $parcAuto->delete();

            return Redirect::route($this->route . '.index')->with('success_msg', 'Suppression effectuée avec succès.');
        } catch (QueryException $e) {
            return Redirect::route($this->route . '.index')->with('error_msg', 'Erreur lors de la suppression de cet enregistrement.');
        }
    }
}
