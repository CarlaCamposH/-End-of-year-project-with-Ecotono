<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if ($idUser = Auth::user() == null) {
            $comp = false;
            $productos = Product::where('id', $id)->get();
            $reviews = Review::where('id_product', $id)->paginate(4);
            $count = Review::where('id_product', $id)->count();
            $puntuacion = Review::where('id_product', $id)->sum('puntuacion');
            return view('details.review', ['productos' => $productos, 'reviews' => $reviews, 'count' => $count, 'puntuacion' => $puntuacion]);
        } else {
            $comp = false;
            $productos = Product::where('id', $id)->get();
            $reviews = Review::where('id_product', $id)->paginate(4);
            $count = Review::where('id_product', $id)->count();
            $puntuacion = Review::where('id_product', $id)->sum('puntuacion');
            if ($puntuacion == 0) {
                $puntuacion = 0;
            }
            $idUser = Auth::user()->getId();
            $SaberReview =  DB::select('SELECT * FROM reviews WHERE id_user =? AND id_product=?', [$idUser, $id]);
            if ($SaberReview == []) {
                $comp = true;
            } else {
                $comp = false;
            }
            return view('details.review', ['productos' => $productos, 'reviews' => $reviews, 'count' => $count, 'puntuacion' => $puntuacion, 'comp' => $comp, 'id' => $id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $productos = Product::where('id', $id)->get();
        return view('details.addreview', ['productos' => $productos, 'id_user' => Auth::user()->getId()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'comentario' => 'required|min:3',
            'puntuacion' => 'required|min:1',
        ]);
        $entrada = $request->all();

        Review::create($entrada);
        $id = $request->input('id_product');

        return redirect('/details/review/' . $id)->with('mssg', 'Review añadida con éxito!');
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
}
