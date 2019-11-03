<?php


namespace App\Http\Controllers;


use App\Traits\UploadFile;

class BasePrivatController extends Controller
{
    use UploadFile;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
