<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //validation.php resources/lang/en
            'nombre' => ['required','regex:/^[A-Za-z]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'calle' => ['required', 'max:255'],
            'ciudad' => ['required', 'string'],
            'provincia' => ['required'],
            'Codigo_Postal' => ['required', 'numeric','min:5'],
            'portal' => ['required', 'numeric'],
            'bloque' => ['string', 'nullable'],
            'piso' => ['required', 'numeric' ],
            'puerta' => ['required', 'numeric'],



            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $id_role = 2;
        return User::create([
            'name' => $data['nombre'],
            'email' => $data['email'],
            'calle' => $data['calle'],
            'ciudad' => $data['ciudad'],
            'provincia' => $data['provincia'],
            'Cpostal' => $data['Codigo_Postal'],
            'portal' => $data['portal'],
            'bloque' => $data['bloque'],
            'piso' => $data['piso'],
            'puerta' => $data['puerta'],
            'id_role' => $id_role,
            'password' => Hash::make($data['password']),
        ]);
    }
}
