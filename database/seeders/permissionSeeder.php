<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $permissions = [
            'unit-create',
            'unit-update',
            'unit-delete',
            'unit-search',
            'rank-create',
            'rank-update',
            'rank-delete',
            'rank-search',
            'staff-view',
            'roles-view',
            'permissions-view',
            'search-staff',
            'update-staff-info',
            'update-staff-numbers',
            'distribution-staff-simcard',
            'dashboard-view',
            'simcards-distributions',
            'report-view',
            'staff-info',
            'user-manage',
            ''

        ];
        foreach ($permissions as $permission) {

            Permission::create(['name'=>$permission]);

        }
    }
}
