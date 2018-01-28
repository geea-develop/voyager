<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();

        if (User::count() == 0) {

            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);
        } else {

            User::where('admin', true)->forceFill(['role_id' => $role->id]);

            $role = Role::firstOrNew(['name' => 'user']);

            User::where('admin', false)->forceFill(['role_id' => $role->id]);

        }

    }
}
