<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/inscription/create';

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
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'codemassar' => ['required', 'string', 'min:10', 'max:10'],
            'cin' => ['required', 'string', 'max:10'],
            'datenaissance' => ['required', 'date'],
            'lieunaissance' => ['required', 'string'],
            'sexe' => ['required', 'string'],
            'ville' => ['required', 'string'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'min:10', 'max:13'],
        ],[
            'nom.required' => 'Veuillez entrer votre nom',
            'prenom.required' => 'Veuillez entrer votre prenom',
            'email.required' => 'Veuillez entrer votre email',
            'password.min' => 'Il faut qu\'il passe 8 caractère',
            'codemassar.max' => 'Il faut qu\'il egale 10 caractère',
            'codemassar.min' => 'Il faut qu\'il egale 10 caractère',
            'cin.max' => 'Il faut qu\'il ne passe pas 10 caractère',
            'telephone.min' => 'Votre numero de telephone non complète',
            'telephone.max' => 'Votre numero de telephone passe l\'énorme',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => strtoupper($data['nom']),
            'prenom' => strtoupper($data['prenom']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'codemassar' => strtoupper($data['codemassar']),
            'cin' => strtoupper($data['cin']),
            'datenaissance' => $data['datenaissance'],
            'lieunaissance' => $data['lieunaissance'],
            'sexe' => $data['sexe'],
            'ville' => $data['ville'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
        ]);
    }
}
