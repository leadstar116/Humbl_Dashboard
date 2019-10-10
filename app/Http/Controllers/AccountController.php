<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Anam\PhantomMagick\Converter;

class AccountController extends Controller
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
        return view('account');
    }

    public function qrcode()
    {
        $conv = new Converter();
        // $conv->source('http://127.0.0.1:8000/home')
        //     ->toJpg()
        //     ->download('business_qrcode.jpg');
        // $conv->addPage('<html><body><h1>Welcome to PhantomMagick</h1></body></html>')
        //     ->toPdf()
        //     ->download('business_qrcode.pdf');
        return view('qrcode')->with('user', Auth::user());
    }
}
