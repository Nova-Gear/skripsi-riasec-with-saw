<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Seeder
        $user = User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        // admin can do anything ha ha ha 
        $permissions = Permission::pluck('id','id')->all();
   
        // add role permission
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        // Mahasiswa Seeder
        $user = User::create([
            'name' => 'mahasiswa', 
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('password')
        ]);
    
        $role = Role::create(['name' => 'Mahasiswa']);
     
        // mahasiswa can create new ekstra, and prestasi based on their school
        $permissions = Permission::select('id')
        ->Where('name','like','ekstra%')
        ->orWhere('name','like','prestasi%')
        ->pluck('id','id');

        // add role permission
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}