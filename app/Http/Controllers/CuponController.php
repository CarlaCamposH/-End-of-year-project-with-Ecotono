<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CuponController extends Controller
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
        return view('coupon.addcoupon');
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
        $entrada = $request->all();
        $validar_nombre = $request->code;
        $nombre_cupon = DB::select('select `code` from coupons where code = ?', [$validar_nombre]);
        if ($nombre_cupon != null) {
            return redirect('/coupon/addCoupon')->with('error', 'Nombre del cupon repetido!');
        }

        Coupon::create($entrada);

        return redirect('/coupon/addCoupon')->with('mssg', 'Cupon añadido con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cupones = Coupon::all();
        $total_cupones = Coupon::all()->count();
        $cupones_encontrados = count($cupones);
        return view('coupon.deletecoupon', [
            'cupones' => $cupones, 'total_cupones' => $total_cupones, 'cupones_encontrados' => $cupones_encontrados,
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
    public function update(Request $request)
    {
        $name  = $request->get('code');
        $error = null;
        $cupones = Coupon::orderBy('id', 'ASC')
            ->name($name)->get();
        $total_cupones = Coupon::all()->count();
        $cupones_encontrados = count($cupones);
        if (count($cupones) > 0) {

            return view('coupon.deletecoupon', [
                'cupones' => $cupones, 'error' => $error, 'total_cupones' => $total_cupones, 'cupones_encontrados' => $cupones_encontrados
            ]);
        } else {
            $error = "¡No se encontro ningun cupon con ese nombre!";
            return \View::make('coupon.deletecoupon', compact('error', 'total_cupones', 'cupones_encontrados'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cupon = Coupon::findOrFail($id);
        $cupon->delete();
        return redirect('/coupon/delete')->with('mssg', 'Cupon borrado correctamente!');
    }
}
