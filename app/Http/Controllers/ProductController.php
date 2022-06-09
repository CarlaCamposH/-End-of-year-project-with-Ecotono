<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if ($idUser = Auth::user() == null) {
            $productos = Product::where('id_category', 1)->paginate(3);
            return view('catalogue.men', [
                'productos' => $productos
            ]);
        } else {
            //esta logueado
            $comp = false;
            $productos = Product::where('id_category', 1)->paginate(3);
            $idUser = Auth::user()->getId();
            $contador = Product::where('id_category', 1)->count();

            $SaberFavoritos =  DB::select('SELECT `id_product` FROM favoritos WHERE id_user =?', [$idUser]);


            return view('catalogue.men', [
                'productos' => $productos
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function WomenIndex()
    {

        $productos = Product::where('id_category', 2)->paginate(3);

        return view('catalogue.women', [
            'productos' => $productos,
        ]);
    }
    public function NewsProducts()
    {

        $productos = Product::latest()->take(4)->paginate(4);
        return view('catalogue.news', [
            'productos' => $productos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($idUser = Auth::user() == null) {
            $producto = Product::findOrFail($id);
            return view('details.product', ['producto' => $producto]);
        } else {
            $producto = Product::findOrFail($id);
            $idUser = Auth::user()->getId();
            $SaberFavoritos =  DB::select('SELECT * FROM favoritos WHERE id_user =? AND id_product=?', [$idUser, $id]);
            if ($SaberFavoritos != null) {
                $comp = false;
            } else {
                $comp = true;
            }
            return view('details.product', ['producto' => $producto, 'comp' => $comp]);
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
        $productos = Product::where('id', $id)->get();
        return view('products.modifyproduct', ['productos' => $productos]);
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
        $category = $this->validator($request->all())->validate();
        $id = $request->input('id');
        $category = Product::find($id);
        $category->name = $request->input('nombre');
        $category->id_category = $request->input('id_category');
        $category->description = $request->input('description');
        $category->price = $request->input('precio');
        $category->stock = $request->input('stock');

        for ($i = 1; $i <= 3; $i++) {
            if ($archivo = $request->file('image' . $i)) {

                $nombre[$i] = $archivo->getClientOriginalName();
                $archivo->move('images/productimages', $nombre[$i]);

                $category['image' . $i] = $nombre[$i];
            }
        }
        $category->save();
        return redirect('/products/delete')->with('mssg', 'Producto modificado con éxito!');
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

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'nombre' => ['required'],
            'id_category' => ['required'],
            'description' => ['required'],
            'precio' => ['required', 'numeric', 'max:255'],
            'stock' => ['required', 'numeric', 'max:255'],
            'image1' => ['nullable'],
            'image2' => ['nullable'],
            'image3' => ['nullable'],
        ]);
    }
}
