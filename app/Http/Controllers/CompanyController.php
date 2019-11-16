<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends BasePrivatController
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
        $users = DB::table('users')
            ->where('show_profil', 1)
            ->where('is_activ_profil', 1)
            ->where('is_company', 1)
            ->get();
        return view('company', [
            'users' => $users,
            'isList' => true
        ]);
    }
}
