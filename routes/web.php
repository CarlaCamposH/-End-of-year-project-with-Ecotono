<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ACCEDER COMO INVITADO
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faq', function () {
    return view('faq');
});

//CATALOGO 
Route::get('/catalogue/men', 'ProductController@index')->name('product.index');
Route::get('/catalogue/women', 'ProductController@WomenIndex');
Route::get('/catalogue/news', 'ProductController@NewsProducts');

/////////////////////////////////////////////////////////////////////////////////////////////////


//SOLO PUEDE ENTRAR SI ESTA LOGUEADO CON EL ROL CLIENTE

///////////////////////////////////////////////////////////////////////////////////////////////////
//VISTA DEL PRODUCTO 
Route::get('/details/product/{id}', 'ProductController@show')->name('details.product');

//PRODUCTOS FAVORITOS
Route::get('/details/favorites/', 'FavoritoController@index');
Route::get('/details/favorites/{id}', 'ReviewController@create');
Route::post('/details/favoritesbbdd/', 'FavoritoController@store');
Route::get('/details/deletefavorito/{id}', 'FavoritoController@destroy')->name('details.deletefavortio');

//CARRITO DE COMPRA
Route::get('/store/cart-add', 'CartController@add')->name('cart.add');
Route::get('/store/cart-clear', 'CartController@clear')->name('cart.clear');
Route::get('/store/cart-removeitem', 'CartController@removeitem')->name('cart.removeitem');

//VER REVIEWS DE UN PRODUCTO
Route::get('/details/review/{id}', 'ReviewController@index')->name('details.review');

////////////////////////////////////////////////////////////////////////////////////////////////



//AÑADIR PROODUCTOS
Route::get('/products/addproduct', 'AddProductController@index')->middleware('role:1');
Route::post('/products/addproductbbdd', 'AddProductController@store')->middleware('role:1');




//Vista Ordenes
Route::get('/products/orders', 'OrdersController@show')->name('products.orders');
Route::get('/products/done/{id}', 'OrdersController@store')->name('orders.done');

//DELETE DEL PRODUCTO

Route::get('/products/delete', 'DeleteProductController@index');
Route::get('/products/deleteproduct/{id}', 'DeleteProductController@destroy')->name('products.deleteproduct');

//MODIFY PRODUCT
Route::get('/products/edit/{id}', 'ProductController@edit')->middleware('role:1')->name('products.edit');
Route::post('/products/editproductbbdd', 'ProductController@update')->middleware('role:1');




//BUSCADOR EN DELETE

Route::get('/products/search', 'DeleteProductController@show')->name('products.search');


//buscador en orders
Route::get('/orders/search', 'OrdersController@BuscarPorNombre')->name('orders.search');


//PASARELA DE PAGO
Route::get('/paypal/comprar', 'PaymentController@comprar')->name('paypal.comprar');
Route::get('/paypal/pay', 'PaymentController@payWithPaypal')->name('paypal.pay');
Route::get('/paypal/status', 'PaymentController@payPalStatus')->name('paypal.status');
Route::get('/store/cart-checkout', 'CartController@cart')->name('cart.checkout');

Route::get('/store/buy-checkout', 'PaymentController@cart')->name('buy.checkout');

Route::get('/buy/success', function () {
    return view('buy.success');
})->middleware('auth');


Route::get('/paypal/address', 'PaymentController@direccion')->name('paypal.address');



//AÑADIR REVIEW

Route::get('/details/addreview/{id}', 'ReviewController@create')->middleware('auth')->name('details.addreview');
Route::post('/details/addreviewbbdd', 'ReviewController@store')->middleware('auth');





//AÑADIR CUPON
Route::get('/coupon/addCoupon', 'CuponController@index');
Route::post('/coupon/addCouponbbdd', 'CuponController@store');


//ELIMINAR CUPON

Route::get('/coupon/delete', 'CuponController@show');
Route::get('/coupon/deletecupon/{id}', 'CuponController@destroy')->name('coupon.delete');
//buscador cupon
Route::get('/coupon/search', 'CuponController@update')->name('coupon.search');

Route::get('/failed', function () {
    return view('buy.failed');
});


Route::get('/paypal/failed', function () {
    return view('buy.failed');
});

Route::get('/products/estado', 'OrdersController@listEstado');
