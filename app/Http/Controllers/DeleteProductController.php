<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class DeleteProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:1');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::all();
        $error = null;
        $total_products = Product::all()->count();
        $productos_encontrados = count($productos);
        return \View::make('products.deleteproduct', compact('productos', 'error', 'total_products', 'productos_encontrados'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $name  = $request->get('name');
        $error = null;
        $productos = Product::orderBy('id', 'ASC')
            ->name($name)->get();

        $total_products = Product::all()->count();
        $productos_encontrados = count($productos);
        if (count($productos) > 0) {
            $error = null;
            return \View::make('products.deleteproduct', compact('productos', 'error', 'total_products', 'productos_encontrados'));
        } else {
            $error = "No se encontro nada!";
            return \View::make('products.deleteproduct', compact('error', 'total_products', 'productos_encontrados'));
        }
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
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect('/products/delete')->with('mssg', 'Producto Borrado Correctamente!');
    }
}
