<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
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
        $usuarios = HTTP::withHeaders([
            'Authorization' => 'bkPwxj6SoH5r6QO6It9faoiR7ZOd0AU7dnNwkSrBOe8',
        ])->get('https://api.contifico.com/sistema/api/v1/producto/');
        
        $usuariosArray = $usuarios->json();
        dd($usuariosArray);
        
        return view('home', compact('usuariosArray'));
    }
}
