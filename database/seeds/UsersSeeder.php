<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create();

        \App\User::create([
            'name' => 'Patrick Oryono',
            'email' => 'patricken08@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
