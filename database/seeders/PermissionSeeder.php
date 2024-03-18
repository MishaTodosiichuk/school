<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create (['name'=>'show role']);
        Permission::create (['name'=>'add role']);
        Permission::create (['name'=>'edit role']);
        Permission::create (['name'=>'delete role']);
    }
}
