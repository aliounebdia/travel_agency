<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    protected $route = 'roles';
    protected $form = 'role_form';
    protected $show = 'role_show';
    protected $permission = 'rôles';

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

        $table_headers = ['Nom', 'Actions'];
        $table_columns = ['name'];

        return view('pages.index_roles')
            ->with([
                'titre_page' => 'Liste des rôles',
                'liste' => Role::all()->except(1),
                'table_headers' => $table_headers,
                'table_columns' => $table_columns,
                'route' => $this->route,
                'show' => $this->show,
                'permission' => $this->permission,
            ]);
    }

    public function create()
    {
        if (!hasPermission('Ajouter '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $liste_permissions = Permission::all();
        $categories = Permission::get('categorie')->unique('categorie');

        return view('pages.create')
            ->with([
                'titre_page' => 'Ajouter un rôle',
                'route' => $this->route,
                'show' => $this->show,
                'permission' => $this->permission,
                'liste_permissions' => $liste_permissions,
                'categories' => $categories,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        if (!hasPermission('Ajouter '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $data = [];
        $data['name'] = $request->name;
        $data['guard_name'] = 'web';

        $role = Role::create($data);
        $role->syncPermissions($request->permissions);

        return Redirect::route($this->route.'.index')->with('success_msg', 'Ajout effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if (!hasPermission('Afficher '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        return $role->only(['name', 'permissions']);
    }

    public function edit(Role $role)
    {
        if (!hasPermission('Modifier '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $liste_permissions = Permission::all();
        $categories = Permission::get('categorie')->unique('categorie');

        return view('pages.edit')
            ->with([
                'titre_page' => 'Modifier un rôle',
                'route' => $this->route,
                'show' => $this->show,
                'permission' => $this->permission,
                'liste_permissions' => $liste_permissions,
                'categories' => $categories,
                'role' => $role,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if (!hasPermission('Modifier '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        $data = $request->validated();
        $role->update($data);
        $role->syncPermissions($request->permissions);

        return Redirect::route($this->route.'.index')->with('success_msg', 'Modification effectuée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (!hasPermission('Supprimer '.$this->permission)) {
            return Redirect::back()->with('error_msg', 'Action non autorisée');
        }

        try {
            $permissions = $role->permissions;
            $role->revokePermissionTo($permissions);
            $role->delete();

            return Redirect::route($this->route.'.index')->with('success_msg', 'Suppression effectuée avec succès.');
        }
        catch (QueryException $e) {
            return Redirect::route($this->route.'.index')->with('error_msg', 'Erreur lors de la suppression de cet enregistrement.');
        }
    }
}
