<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Favorito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FavoritoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->getId();

        $data = DB::table('favoritos')
            ->join('products', 'favoritos.id_product', '=', 'products.id')
            ->select('favoritos.*', 'products.*')
            ->where('id_user', '=', $id_user)
            ->paginate(4);
        // dd($data);
        return view('/details/favorites', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $productos = Product::where('id_product', $id)->get();
        return view('/details/favorites', ['productos' => $productos, 'id_user' => Auth::user()->getId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ifExist =  DB::select('SELECT * FROM favoritos WHERE id_user =? AND id_product=?', [Auth::id(), $request->input('id_product')]);
        //dd($SaberReview );
        if ($ifExist == null) {
            $entrada = new Favorito;
            $entrada->id_product = $request->input('id_product');
            $entrada->id_user = Auth::id();
            $entrada->save();
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //   dd($id);

        //$producto = Favorito::find($id);
        $id_user = Auth::user()->getId();
        $producto = Favorito::where('id_product', $id);
        //dd($producto);
        // $ifExist =  DB::select('SELECT `id_product` FROM favoritos WHERE id_user =? AND id_product=?',[Auth::id(),$id]);
        //dd($ifExist);
        $producto->delete();
        return back();
    }
}
