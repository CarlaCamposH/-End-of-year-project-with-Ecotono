<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Paypal;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payment;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\PaymentExecution;
use Cart;
use Auth;
use App\Coupon;
use App\User;
use App\Factura;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    private $apiContext;
    private $total = 0;

    public $final = null;




    public function __construct()
    {
        $this->middleware('auth');
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(

            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );
    }

    public function cart(Request $request)
    {

        $_SESSION['provincia'];
        $_SESSION['Cpostal'];
        $_SESSION['ciudad'];
        $_SESSION['calle'];
        $_SESSION['portal'];
        $_SESSION['bloque'];
        $_SESSION['piso'];
        $_SESSION['puerta'];
        $_SESSION['id_coupon'];

        $coupon = $request->input('coupon');
        $userId = Auth::user()->getId();
        $usuario = DB::select('select * from users where id = ?', [$userId]);
        $porcentaje = Coupon::where('code', $coupon)->pluck('discount');
        $id_coupon = Coupon::where('code', $coupon)->pluck('id');
        $existe = 1;
        $subTotal = Cart::getSubTotal();
        $_SESSION['cupon'] = Cart::getSubTotal();
       if(isset($id_coupon[0])){
        $existe = DB::select('select * from facturas where id_cupon = ? and name_user = ?', [$id_coupon[0], $usuario[0]->name]);
       }else{
        return back()->with('error', '¡El cupon ingresado no existe!');
       }
        if ($existe == null) {
            $_SESSION['id_coupon'] = $id_coupon[0];
            $descuento = ($subTotal * $porcentaje[0]) /  100;
            $total = $subTotal - $descuento;

            $_SESSION['descuento'] = $descuento;
            $_SESSION['porcentaje'] = $porcentaje[0];


            $_SESSION['cupon'] = $total;
        } else {
            return back()->with('error', '¡Cupon previamente utilizado!');
        }
        return view('buy.buyoption', ['subTotal' => $subTotal, 'total' => $_SESSION['cupon'], 'provincia' => $_SESSION['provincia'], 'Cpostal' => $_SESSION['Cpostal'], 'ciudad' => $_SESSION['ciudad'], 'calle' => $_SESSION['calle'], 'portal' => $_SESSION['portal'], 'bloque' => $_SESSION['bloque'], 'piso' => $_SESSION['piso'], 'puerta' => $_SESSION['puerta']])
            ->with('msg', 'Cupon añadido Correctamente');
    }
    
    public function comprar()
    {

        $total = Cart::getSubTotal();
        $_SESSION['cupon'] = $total;
        $_SESSION['descuento'] = 0;
        $_SESSION['porcentaje'] = 0;
        $userId = Auth::user()->getId();
        $usuario = DB::select('select * from users where id = ?', [$userId]);
        $_SESSION['provincia'] = $usuario[0]->provincia;
        $_SESSION['Cpostal'] = $usuario[0]->Cpostal;
        $_SESSION['ciudad'] = $usuario[0]->ciudad;
        $_SESSION['calle'] = $usuario[0]->calle;
        $_SESSION['portal'] = $usuario[0]->portal;
        $_SESSION['bloque'] = $usuario[0]->bloque;
        $_SESSION['piso'] = $usuario[0]->piso;
        $_SESSION['puerta'] = $usuario[0]->puerta;
        $_SESSION['id_coupon'] = 0;

        return view('buy.buyoption', ['total' => $total, 'provincia' => $_SESSION['provincia'], 'Cpostal' => $_SESSION['Cpostal'], 'ciudad' => $_SESSION['ciudad'], 'calle' => $_SESSION['calle'], 'portal' => $_SESSION['portal'], 'bloque' => $_SESSION['bloque'], 'piso' => $_SESSION['piso'], 'puerta' => $_SESSION['puerta']]);
    }

    public function direccion(Request $request)
    {


        $entrada = $this->validator($request->all())->validate();
        $userId = Auth::user()->getId();
        $usuario = DB::select('select * from users where id = ?', [$userId]);
        $_SESSION['provincia'] = $request->provincia;
        $_SESSION['Cpostal'] = $request->Codigo_Postal;
        $_SESSION['ciudad'] = $request->ciudad;
        $_SESSION['calle'] = $request->calle;
        $_SESSION['portal'] = $request->portal;
        $_SESSION['bloque'] = $request->bloque;
        $_SESSION['piso'] = $request->piso;
        $_SESSION['puerta'] = $request->puerta;
        $total  = $_SESSION['cupon'];
        return view('buy.buyoption', ['total' => $total, 'provincia' => $_SESSION['provincia'], 'Cpostal' => $_SESSION['Cpostal'], 'ciudad' => $_SESSION['ciudad'], 'calle' => $_SESSION['calle'], 'portal' => $_SESSION['portal'], 'bloque' => $_SESSION['bloque'], 'piso' => $_SESSION['piso'], 'puerta' => $_SESSION['puerta']]);
    }

    public function payWithPaypal(Request $request)
    {

        $total = $_SESSION['cupon'];
        $descuento = $_SESSION['descuento'];
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');


        $carrito = Cart::getContent();
        $items = array();
        foreach ($carrito as $producto) {
            $item = new Item();
            if ($_SESSION['porcentaje'] == 0) {
                $descuento = 0;
            } else {
                $descuento = ($producto->price * $_SESSION['porcentaje']) /  100;
            }
            $item->setName($producto->name . " - talla: " . $producto->size)
                ->setCurrency('EUR')
                ->setQuantity($producto->quantity)
                ->setPrice($producto->price - $descuento);

            $total = $_SESSION['cupon'];
            $descuento = $_SESSION['descuento'];
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');


            $carrito = Cart::getContent();

            $items = array();
            foreach ($carrito as $producto) {
                $item = new Item();
                $descuento = ($producto->price * $_SESSION['porcentaje']) /  100;
                $item->setName($producto->name . " - talla: " . $producto->size)
                    ->setCurrency('EUR')
                    ->setQuantity($producto->quantity)
                    ->setPrice($producto->price - $descuento);

                $items[] = $item;
            }

            $itemList = new ItemList();
            $itemList->setItems($items);



            $amount = new Amount();
            $amount->setTotal($total);
            $amount->setCurrency('EUR');


            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Compra en ECOTONE");

            $callbackUrl = url('/paypal/status');
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl($callbackUrl)
                ->setCancelUrl($callbackUrl);

            $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions(array($transaction))
                ->setRedirectUrls($redirectUrls);

            $request = clone $payment;


            try {
                $payment->create($this->apiContext);

                return redirect()->away($payment->getApprovalLink());
            } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getData();
            }
        }
    }

    public function payPalStatus(Request $request)
    {

        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');
        if (!$paymentId || !$payerId || !$token) {
            $status = 'No se pudo realizar el pago de paypal.';
            return redirect('/paypal/failed')->with(compact('status'));
        }
        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            $id_user = Auth::user()->getId();
            $user = Auth::user();
            $name_user = $user->getName();
            $id_cupon = $_SESSION['id_coupon'];
            if ($id_cupon != 0) {

                $carrito = Cart::getContent();
                $nombre = null;
                foreach ($carrito as $item) {
                    $nombre .= $item->name;
                    $nombre .= " - Talla: ";
                    $nombre .= $item->size;
                    $nombre .= " - Cantidad: ";
                    $nombre .= $item->quantity;
                    $nombre .= "; ";
                }
                $direccion_final =
                    $_SESSION['provincia'] . " " .
                    $_SESSION['Cpostal'] . " " .
                    $_SESSION['ciudad'] . " " .
                    $_SESSION['calle'] . " " .
                    $_SESSION['portal'] . " " .
                    $_SESSION['bloque'] . " " .
                    $_SESSION['piso'] . " " .
                    $_SESSION['puerta'];
                DB::table('facturas')->insert(
                    [
                        'id_cupon' => $id_cupon, 'name_user' => $name_user, 'direccion_de_envio' => $direccion_final,
                        'productos' => $nombre, 'total_price' => $_SESSION['cupon'], 'estado' => 'pagado'
                    ]
                );
            } else {
                $carrito = Cart::getContent();
                $nombre = null;
                foreach ($carrito as $item) {
                    $nombre .= $item->name;
                    $nombre .= " - Talla: ";
                    $nombre .= $item->size;
                    $nombre .= " - Cantidad: ";
                    $nombre .= $item->quantity;
                    $nombre .= "; ";
                }

                $direccion_final =
                    $_SESSION['provincia'] . " " .
                    $_SESSION['Cpostal'] . " " .
                    $_SESSION['ciudad'] . " " .
                    $_SESSION['calle'] . " " .
                    $_SESSION['portal'] . " " .
                    $_SESSION['bloque'] . " " .
                    $_SESSION['piso'] . " " .
                    $_SESSION['puerta'];

                DB::table('facturas')->insert(
                    [
                        'id_cupon' => null, 'name_user' => $name_user, 'direccion_de_envio' => $direccion_final,
                        'productos' => $nombre, 'total_price' => $_SESSION['cupon'], 'estado' => 'pagado'
                    ]
                );
            }

            $this->actualizarCupon();
           
            Cart::clear();

            return redirect('/buy/success');

        } else {
            return redirect('/failed');
        }
    }
    private function actualizarCupon()
    {
        $productsCart = Cart::getContent();

        foreach ($productsCart as $item) {
            $id = $item->id;
            $quantity = $item->quantity;
            $stock = $item->stock;
            DB::table('products')
                ->where('id', $id)
                ->update(
                    ['stock' => $stock - $quantity]
                );
        }
    }

    

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'calle' => ['required', 'max:255'],
            'ciudad' => ['required'],
            'provincia' => ['required'],
            'Codigo_Postal' => ['required', 'numeric', 'regex:/^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$/'],
            'portal' => ['required', 'numeric'],
            'bloque' => ['string', 'nullable'],
            'piso' => ['required', 'numeric'],
            'puerta' => ['required', 'numeric'],
        ]);
    }
}
