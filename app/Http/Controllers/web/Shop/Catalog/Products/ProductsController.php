<?php

namespace App\Http\Controllers\web\Shop\Catalog\Products;

use App\Http\Controllers\Controller;
use App\Models\Shop\Catalog\Products\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.shop.catalog.products.index')
            ->with('rows', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = 0;
        $success = false;

        try {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            $id = $product->id;
            $success = true;
        } catch (\Exception $e) {
            logger('Error creando producto, ' . $request->name);
        }

        return ($success)
            ? redirect()->back()->with('success', 'Producto creado, ID: ' . $id)
            : redirect()->back()->with('error', 'Producto NO creado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = 0;
        $success = false;

        try {
            Product::find($id)->delete();
            $success = true;
        } catch (\Exception $e) {
            logger('Error eliminado producto, ID: ' . $id);
        }

        return ($success)
            ? redirect()->back()->with('success', 'Producto eliminada, ID: ' . $id)
            : redirect()->back()->with('error', 'Producto NO eliminado');
    }
}
