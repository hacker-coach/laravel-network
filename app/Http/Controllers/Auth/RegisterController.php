<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Rules\AccessCode;

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationCompanyForm()
    {
        return view('auth.registercompany');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $code = 'dc802028aa03d5c38e9dfd903b0ba15e7fe19be00c5b0757b477ded512178f53611feddcc7e9af77976438bfdf156d2f86fbdb19670d399ee41ff8535be4c661';

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
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', new AccessCode($this->code)],
            'dgsvo' => 'accepted',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        if($data['code']===$this->code){
                $user = User::create([
                    'name' => $data['name'],
                    'is_company' => (boolean)$data['is_company'],
                    'dgsvo' => (boolean)$data['dgsvo'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);

                Mail::to('log@problemsolvernetwork.org')->send(new VerificationMail($user,'RegisterController::create'));
                return $user;
        }
        Auth::logout();
        header("HTTP/1.0 404 Not Found"); exit;
    }
}
