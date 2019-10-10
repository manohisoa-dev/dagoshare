<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        
        Role::create(['name' => 'user']);    /** @var \App\User $user */
        $user = factory(\App\Tag::class)->create();

        $user->assignRole('user');    Role::create(['name' => 'admin']);

        /** @var \App\User $user */
        $admin = factory(\App\User::class)->create([
            'nom'       => 'Super',
            'prenom'    => 'admin',
            'email'     => 'super.admin@gmail.com',
        ]);

        $admin->assignRole('admin');
    }
}
