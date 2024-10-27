<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class RoleUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleadmin = Role::firstOrCreate(['name'=>'admin']);
        $roleuser = Role::firstOrCreate(['name'=>'user']);

        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin123@gmail.com',
            'password'=>Hash::make('123456789')
        ]);

        $admin->assignRole($roleadmin);
    }
}
