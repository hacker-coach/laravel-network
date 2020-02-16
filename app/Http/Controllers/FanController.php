<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FanController extends BasePrivatController
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
            ->where('role_fan', 1)
            ->where('is_user_activ', 1)
            ->where('is_user_show', 1)
            ->get();
        return view('fan', [
            'users' => $users,
            'isList' => true
        ]);
    }
}
