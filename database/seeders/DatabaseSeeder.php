<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(PermissionSeeder::class);

        $user = User::factory()->create([
              'email' => config('permission.admin_user_name'),
              'user_type'=>'admin'
        ])->assignRole('admin');

        User::factory(5)->create();
    }
}
