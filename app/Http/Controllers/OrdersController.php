<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Factura;
use App\User;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
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

        return view('products.vieworders');
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
    public function store($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->estado = 'completado';
        $factura->save();
        return redirect('/products/orders')->with('mssg', 'Producto añadido con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $productos = array();

        $facturas = Factura::all();
        $pedidos =  DB::select('SELECT `productos` FROM facturas');
        foreach ($pedidos as $item) {
            array_push($productos, explode(";", $item->productos));
        }
        $productos_count = count($productos);
        return view('products.vieworders', [
            'facturas' => $facturas, 'productos' => $productos, 'productos_count' => $productos_count
        ]);
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
    public function update()
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listEstado()
    {
        $productos = array();

        $facturas = Factura::all()->sortBy('estado');
        $pedidos =  DB::select('SELECT `productos` FROM facturas');
        foreach ($pedidos as $item) {
            array_push($productos, explode(";", $item->productos));
        }
        $productos_count = count($productos);
        return view('products.vieworders', [
            'facturas' => $facturas, 'productos' => $productos, 'productos_count' => $productos_count
        ]);
    }
    public function BuscarPorNombre(Request $request)
    {

        $name  = $request->get('name_user');
        $productos = array();
        $error = null;
        $facturas = Factura::orderBy('id', 'ASC')
            ->name($name)
            ->paginate(8);
        $pedidos =  DB::select('SELECT `productos` FROM facturas');
        foreach ($pedidos as $item) {
            array_push($productos, explode(";", $item->productos));
        }
        $productos_count = count($productos);
        if (count($facturas) > 0) {
            $error = null;
            return \View::make('products.vieworders', compact('facturas', 'error', 'productos_count', 'productos'));
        } else {
            $error = "No se encontro nada!";

            return \View::make('products.vieworders', compact('error', 'facturas'));
        }
    }
}
