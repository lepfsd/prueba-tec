<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name'=>'admin',
            ],
            [
               'name'=>'ejecutivos',
            ],
            [
               'name'=>'imagenes',
            ],
            [
                'name'=>'sgr',
            ],
            [
                'name'=>'iva',
            ],
            [
                'name'=>'paises',
            ],
            [
                'name'=>'monedas',
            ],
            [
                'name'=>'uso_plataforma',
            ],
            [
                'name'=>'notaria',
            ],
            [
                'name'=>'submenus',
            ],
            [
                'name'=>'submenu_actions',
            ],
            [
                'name'=>'carga_masiva',
            ],
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }

        $user1 = App\User::create([
            'name'=>'luis perez',
            'email'=>'luisp@devups.io',
            'password'=> bcrypt('foobar1'),
        ]);

        $user2 = App\User::create([
            'name'=>'User',
            'email'=>'use2r@user.com',
            'password'=> bcrypt('foobar1'),
        ]);
    }
}
