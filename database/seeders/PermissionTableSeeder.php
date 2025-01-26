<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'role-list',
           'role-create',
           'role-edit',
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
		
		$role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
		$user = User::create(['name' => 'Priyawart Rangila','email' => 'priyawartrangila@gmail.com','password' => bcrypt('Pr@1234')]);
        $user->assignRole([$role->id]);
		Role::create(['name' => 'User']);
    }
}
