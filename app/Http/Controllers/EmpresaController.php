<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EmpresaController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('funcionarios:funcionarios')->except(['login']);
    }

    public function index()
    {
        return view('empresa.index');
    }
}
