<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        $messages = [
            'min'                         => 'El campo :attribute debe tener al menos :min caracteres',
            'land_phone.required_without' => 'Es necesario informar un teléfono fijo o celular',
            'cel_phone.required_without'  => 'Es necesario informar un teléfono fijo o celular',
            'address.required'            => 'El campo dirección es requerido',
            'city.required'               => 'El campo localidad es requerido',
            'password.confirmed'          => 'Las contraseñas no verifican',
            'email.unique'                => 'Dirección de correo electrónico en uso',
        ];

        return Validator::make($data,
            [
                'name'       => 'required|string|min:4|max:255',
                'email'      => 'required|string|email|max:255|unique:users',
                'password'   => 'required|string|min:6|confirmed',
                'land_phone' => 'required_without:cel_phone',
                'cel_phone'  => 'required_without:land_phone',
                'address'    => 'required',
                'city'       => 'required',
            ],
            $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data) {
        return User::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
            'last_name'  => $data['last_name'],
            'land_phone' => $data['land_phone'],
            'cel_phone'  => $data['cel_phone'],
            'address'    => $data['address'],
            'city'       => $data['city'],
        ]);
    }
}
