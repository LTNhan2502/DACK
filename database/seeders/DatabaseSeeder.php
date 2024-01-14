<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategoriesSeeder::class,
            NguoiDungsSeeder::class,
            ProductsSeeder::class,
            TagsSeeder::class,
            ProductTagSeeder::class,
            ProductImageSeeder::class,
            CustomersSeeder::class,
            OrdersSeeder::class,
            OrderItemsSeeder::class
        ]);
    }
}
