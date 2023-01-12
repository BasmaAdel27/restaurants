<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{

    public function run()
    {

        $publicRoutes = [
            'login',
            'logout',
            'register',
            'password.request',
            'password.email',
            'password.reset',
            'password.update',
            'password.confirm',
            'admin.',
            'admin.profile.index',
            'admin.profile.store',

        ];

        $this->truncateTables();

        foreach (Route::getRoutes() as $route) {
            if (
                $route->getName() != ''
                && @$route->getAction()['middleware']['0'] == 'web'
                && !Permission::where('name', $route->getName())->exists()
                && !in_array($route->getName(), $publicRoutes)
                && !str_contains($route->getName(), 'edit')
                && !str_contains($route->getName(), 'create')
            ) {
                permission::create(['name' => $route->getName()]);
            }
        }

        $this->createRolePermissions();
    }

    private static function createRolePermissions()
    {
        $adminPermissionIds = Permission::where('name', 'like', 'admin.%')->orWhere('name', 'home')->pluck('id');
        $restaurantPermissionIds = Permission::where('name', 'like', 'restaurant.%')->orWhere('name', 'home')->pluck('id');
        dd($restaurantPermissionIds);
        Role::create(['name' => 'admin'])->permissions()->sync($adminPermissionIds);
        Role::create(['name' => 'restaurant'])->permissions()->sync($restaurantPermissionIds);
    }

    private function truncateTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('user_has_roles')->truncate();
        DB::table('user_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        Permission::truncate();
        Role::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
