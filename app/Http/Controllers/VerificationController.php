<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

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
     * @param  integer  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function verification($id)
    {
        if(Auth::user()->id ===1){
            $user = User::where('id', (int)$id)->first();
            $user->is_activ_profil = true;
            $user->save();
            return view('verification', [
                'user' => $user
            ]);
        }
        return redirect()->route('memberDe');
    }
}
