<?php

namespace App\Http\Controllers;

session_start();

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Product;
use Cart;
use Auth;
use App\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $producto = Product::find($request->id);
        Cart::add(
            $producto->id,
            $producto->name,
            $producto->price,
            $request->quantity,
            $request->size,
            $producto->stock,
            $producto->image1,
        );


        return back()->with('¡Producto añadido al carrito!');
    }

    public function removeitem(Request $request)
    {
        $id = $request->id;
        Cart::remove($id);
        return back()->with('¡Producto eliminado del carrito!');
    }

    public function clear()
    {

        Cart::clear();
        return back()->with('¡carrito vacío!');
    }

    public function cart(Request $request)
    {

        $subTotal = Cart::getSubTotal();

        return view('buy.shopcart', ['subTotal' => $subTotal]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'quantity' => ['required', 'min:1', 'max:' . $_SESSION['stock']],





        ]);
    }
}
