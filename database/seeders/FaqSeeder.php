<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'category_id' => '1',
            'question' => 'This is a frequent question about my profile?',
            'answer' => 'This is the answer.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'category_id' => '1',
            'question' => 'This is another frequent question about my profile?',
            'answer' => 'This is the other answer.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'category_id' => '2',
            'question' => 'This is a frequent question about items?',
            'answer' => 'And this is the answer.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'category_id' => '3',
            'question' => 'This is a frequent question about how to contact an admin?',
            'answer' => 'This is the answer.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
