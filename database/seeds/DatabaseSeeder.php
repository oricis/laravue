<?php

use Illuminate\Database\Seeder;
use Seeds\Shop\Catalog\Products\ShopProductsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShopProductsSeeder::class);
    }
}
