<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user=  User::create([
            'name' => 'moi',
            'email' => 'moi@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
           
        ]);
        $role = Role::create(['name'=>'super admin']);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {

            $role->givePermissionTo($permission->name);
            
        }
        $user->assignRole([$role->id]);

        // ->assignRole('admin');
    }
}
