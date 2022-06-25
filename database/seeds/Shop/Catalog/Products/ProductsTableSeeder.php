<?php

namespace Seeds\Shop\Catalog\Products;

use App\Models\Shop\Catalog\Products\Product;
use Illuminate\Database\Seeder;

class ShopProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedProducts();
        dump('Total shop products seeded: ' . Product::count());
    }


    private function seedProducts(): void
    {
        factory(Product::class, 100)
            ->create();
    }
}
