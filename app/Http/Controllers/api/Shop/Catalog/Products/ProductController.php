<?php

namespace App\Http\Controllers\api\Shop\Catalog\Products;

use App\Http\Resources\Shop\Catalog\Products\ProductResource;
use App\Models\Shop\Catalog\Products\Product;

class ProductController
{
    protected string $resourceName = 'products';

    public function index(int $categoryId = 0)
    {
        $products = Product::get();

        $output = [];
        foreach ($products as $product) {
            $output[] = new ProductResource($product);
        }

        return ($output === [])
            ? [
                'status' => 404,
                'ok' => true,
                'data' => [
                    'message' => '0 productos encontrados',
                ],
            ]
            : [
                'status' => 200,
                'ok' => true,
                'data' => [
                    'message' => 'Encontrados ' . count($output) . ' productos',
                    'products'    => $output,
                ]
            ];
    }

    public function get(int $id)
    {
        if ($row = Product::find($id)) {
            $row = new ShopProductResource($row);

            return [
                'status' => 200,
                'ok' => true,
                'data' => [
                    'Producto encontrado',
                    'product'    => $row,
                ]
            ];
        }

        return [
            'status' => 404,
            'ok' => true,
            'data' => [
                'message' => 'No se encuentra el registro, ID: ' . $id,
            ],
        ];
    }
}
