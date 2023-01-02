<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'title' => 'Leather Coat',
            'description' => 'Coat made from real leather.',
            'price' => '164.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Clothes'
        ]);

        DB::table('items')->insert([
            'title' => 'Cheaper Leather Coat',
            'description' => 'Coat made from false leather. This one is cheaper than the other leather coat.',
            'price' => '74.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Clothes'
        ]);

        DB::table('items')->insert([
            'title' => 'Party Dress',
            'description' => 'Nice purple party dress.',
            'price' => '29.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Clothes'
        ]);

        DB::table('items')->insert([
            'title' => 'Flared Jeans',
            'description' => 'High waisted flared jeans, different colors available.',
            'price' => '49.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Clothes'
        ]);

        DB::table('items')->insert([
            'title' => 'Mom jeans',
            'description' => 'High waisted mom jeans.',
            'price' => '39.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Clothes'
        ]);

        DB::table('items')->insert([
            'title' => 'Basic T-shirt',
            'description' => 'Basic t-shirt made from coton.',
            'price' => '9.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Clothes'
        ]);

        DB::table('items')->insert([
            'title' => 'Sneaker 2000',
            'description' => 'White Sneaker 2000.',
            'price' => '99.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Shoes'
        ]);

        DB::table('items')->insert([
            'title' => 'Sneaker 3000',
            'description' => 'Black Sneaker 3000.',
            'price' => '109.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Shoes'
        ]);

        DB::table('items')->insert([
            'title' => 'High Heels',
            'description' => 'Red high heels, 8cm.',
            'price' => '74.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Shoes'
        ]);

        DB::table('items')->insert([
            'title' => 'Classic Boots',
            'description' => 'Classic boots for comfortable walks.',
            'price' => '89.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Shoes'
        ]);

        DB::table('items')->insert([
            'title' => 'Phone Case',
            'description' => 'Basic phone case for smartphones.',
            'price' => '4.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Accessories'
        ]);

        DB::table('items')->insert([
            'title' => 'Tote Bag',
            'description' => 'White tote bag.',
            'price' => '14.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Accessories'
        ]);

        DB::table('items')->insert([
            'title' => 'Crossbody Purse',
            'description' => 'Little bag/purse.',
            'price' => '24.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Accessories'
        ]);

        DB::table('items')->insert([
            'title' => 'Earrings',
            'description' => 'Creole earrings.',
            'price' => '19.99', 
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'Accessories'
        ]);
    }
}
