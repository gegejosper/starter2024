<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::truncate();
        RoleUser::truncate();
        $roles = Role::get();
        foreach($roles as $role){
            $email = $role->name.'@gmail.com';
            $user = User::create([
                'first_name' => $role->name,
                'last_name' => $role->name,
                'email' => $email,
                'password' => Hash::make('password'),
                'status' => 'active',
                'email_verified_at' => Carbon::now()
            ]);
            // $insert_user_role = Role_user::create([
            //     'role_id' => $role->id,
            //     'user_id' => $user->id
            // ]);
            $user->roles()->attach($role);
        }
    }
}
