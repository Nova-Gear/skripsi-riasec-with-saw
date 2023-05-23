<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'ukm-list',
           'ukm-create',
           'ukm-edit',
           'ukm-delete',           

           'ekstra-list',
           'ekstra-create',
           'ekstra-edit',
           'ekstra-delete',

           'prestasi-list',
           'prestasi-create',
           'prestasi-edit',
           'prestasi-delete',

           'riasec-list',
           'riasec-create',
           'riasec-edit',
           'riasec-delete',

        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
