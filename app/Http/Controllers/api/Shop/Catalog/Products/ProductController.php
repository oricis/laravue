<?php

namespace App\Http\Controllers\api\Shop\Catalog\Products;

use App\Http\Resources\Shop\Catalog\Products\ProductResource;
use App\Models\Shop\Catalog\Products\Product;
use Illuminate\Http\Request;

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
        if ($product = Product::find($id)) {
            $product = new ProductResource($product);

            return [
                'status' => 200,
                'ok' => true,
                'data' => [
                    'Producto encontrado',
                    'product' => $product,
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

    public function store(Request $request)
    {
        $arrData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        if ($product = Product::create($arrData)) {
            return [
                'status' => 201,
                'ok' => true,
                'data' => [
                    'message' => 'Producto creado',
                    'product'    => $product,
                ],
            ];
        }
        return 418;
    }

    public function destroy(int $id)
    {
        if (($product = Product::find($id))
            && $product->delete()) {
            return 204;
        }
        return 418;
    }
}
