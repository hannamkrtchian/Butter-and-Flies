<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'email' => 'test@email.com',
            'question' => 'I have a question for the admin?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('contacts')->insert([
            'email' => 'random@email.com',
            'question' => 'I also have a question for the admin? This is the subquestion?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
