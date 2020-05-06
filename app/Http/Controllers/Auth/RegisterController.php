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

    protected $code = '052020';

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
                $user = User::create($this->renderData($data));
                Mail::to('log@problemsolvernetwork.org')->send(new VerificationMail($user,'RegisterController::create'));
                return $user;
        }
        Auth::logout();
        header("HTTP/1.0 404 Not Found"); exit;
    }

    protected function renderData(array $data){
        $dataOut = [
            'name' => $data['name'],
            'role_company' => false,
            'role_ps' => false,
            'role_fan' => false,
            'role_hunter' => false,
            'dgsvo' => (boolean)$data['dgsvo'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];
        if($data['role']=='role_hunter'){
            $dataOut['role_hunter'] = true;
        }else if($data['role']=='role_ps'){
            $dataOut['role_ps'] = true;
        }else if($data['role']=='role_company'){
            $dataOut['role_company'] = true;
        }else if($data['role']=='role_fan'){
            $dataOut['role_fan'] = true;
        }
        return $dataOut;
    }
}
