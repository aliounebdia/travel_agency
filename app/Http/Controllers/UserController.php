<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    protected $route = 'users';
    protected $form = 'user_form';
    protected $show = 'user_show';
    protected $permission = 'utilisateurs';

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

        $table_headers = ['Prénom', 'Nom', 'Email', 'Rôle', 'Actions'];
        $table_columns = ['prenom', 'nom', 'email', 'role'];

        $roles = Role::where('name', '<>', 'Super Admin')->pluck('name', 'id')->all();

        return view('pages.index')
            ->with([
                'titre_page' => 'Liste des utilisateurs',
                'btn_ajout' => 'Ajouter un utilisateur',
                'liste' => User::get()->where('role', '<>', 'Super Admin')->all(),
                'table_headers' => $table_headers,
                'table_columns' => $table_columns,
                'route' => $this->route,
                'form' => $this->form,
                'show' => $this->show,
                'permission' => $this->permission,
                'roles' => $roles,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if (!hasPermission('Ajouter '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $user = User::create();
        $user->assignRole($request->role_id);

        return Redirect::route($this->route.'.index')->with('success_msg', 'Ajout effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!hasPermission('Afficher '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        return $user->only(['prenom', 'nom', 'email', 'role', 'role_id']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (!hasPermission('Modifier '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $data = $request->validated();
        if (!isset($request->password) && !isset($request->password_confirmation)) {
            $data = Arr::except($request->validated(), ['password', 'password_confirmation']);
        }
        else {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        $user->assignRole($request->role_id);

        return Redirect::route($this->route.'.index')->with('success_msg', 'Modification effectuée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!hasPermission('Supprimer '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        try {
            $user->delete();

            return Redirect::route($this->route.'.index')->with('success_msg', 'Suppression effectuée avec succès.');
        }
        catch (QueryException $e) {
            return Redirect::route($this->route.'.index')->with('error_msg', 'Erreur lors de la suppression de cet enregistrement.');
        }
    }
}
