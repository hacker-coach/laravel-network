<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends BasePrivatController
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
    public function index()
    {
        if(Auth::user()->role_ps OR Auth::user()->role_hunter){
            $users = DB::table('users')
                ->where('role_ps', 1)
                ->where('is_user_activ', 1)
                ->where('is_user_show', 1)
                ->get();
            return view('home', [
                'users' => $users,
                'isList' => true
            ]);
        }


        return view('home', [
            'users' => null,
            'isList' => true
        ]);

    }
}
