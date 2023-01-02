<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@ehb.be',
             'password' => Hash::make('Password!321'), 
             'is_admin' => 1,
             'biography' => 'I am the admin of this website.',
             'birthday' => '2002-12-10'
         ]); 

        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'biography' => 'A basic user.',
            'birthday' => '2005-04-11'
         ]);

         $this->call([
            CartSeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            FaqSeeder::class,
            ItemSeeder::class,
        ]);
    }
}
