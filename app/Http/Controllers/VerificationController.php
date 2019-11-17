<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerificationController extends BasePrivatController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        if(Auth::user()->is_activ_profil && Auth::user()->id ===1){
            $user = User::where('id', (int)$id)->first();
            $user->is_activ_profil = true;
            $user->save();
            return view('verification', [
                'user' => $user
            ]);
        }
        return redirect()->route('welcome');
    }
}
