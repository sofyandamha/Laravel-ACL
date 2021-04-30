<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'komda-list',
           'komda-create',
           'komda-edit',
           'komda-delete',
		   'anggota-list',
           'anggota-create',
           'anggota-edit',
           'anggota-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
