<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $roles = App\Role::all();

        $admin = App\User::where('email', 'luisp@devups.io')->first();
        $admin->roles()->attach(
            $roles->where('name', 'admin')->first()
        );

        App\User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(2, 10))->pluck('id')->toArray()
            );
        });
    }
}
