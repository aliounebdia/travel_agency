<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions / CRUD
        $permissions = [
            'utilisateurs',
            'rôles',
        ];
        $perm = [];

        // create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => 'Afficher '.$permission, 'categorie' => $permission]);
            Permission::create(['name' => 'Ajouter '.$permission, 'categorie' => $permission]);
            Permission::create(['name' => 'Modifier '.$permission, 'categorie' => $permission]);
            Permission::create(['name' => 'Supprimer '.$permission, 'categorie' => $permission]);
            $perm[] = 'Afficher '.$permission;
            $perm[] = 'Ajouter '.$permission;
            $perm[] = 'Modifier '.$permission;
            $perm[] = 'Supprimer '.$permission;
        }

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'Administrateur']);
        $role2->givePermissionTo($perm);

        $user = User::find(1);
        $user->assignRole($role1);

        Schema::enableForeignKeyConstraints();
    }
}
