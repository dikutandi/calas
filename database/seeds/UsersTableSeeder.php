<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name'               => 'iniadmin',
            'email'              => 'admin@admin.com',
            'password'           => bcrypt("adminbisa"),
            'roles'              => 'admin',
            'confirmation_token' => '111111111',
            'confirmed_at'       => \Carbon\Carbon::now(),
        ]);

    }
}
