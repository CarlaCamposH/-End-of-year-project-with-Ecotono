<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;

class AddProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.addproduct');
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
        $entrada = $this->validator($request->all())->validate();
        for ($i = 1; $i <= 3; $i++) {
            if ($archivo = $request->file('image' . $i)) {

                $nombre[$i] = $archivo->getClientOriginalName();
                $archivo->move('images/productimages', $nombre[$i]);

                $entrada['image' . $i] = $nombre[$i];
            }
        }
        Product::create([
            'name' => $entrada['nombre'], 'id_category' => $entrada['id_category'], 'description' => $entrada['description'],
            'price' => $entrada['precio'], 'stock' => $entrada['stock'], 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s'),
            'image1' => $entrada['image1'] ?? null, 'image2' => $entrada['image2'] ?? null, 'image3' => $entrada['image3'] ?? null
        ]);
        return redirect('/products/addproduct')->with('mssg', 'Producto añadido con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
