<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// query al db
use App\Models\Train;


class PageController extends Controller
{
    public function index(){
        return view('home');
    }

    public function nuovaPagina(){
        return view('nuova-pagina');
    }

    public function trains(){

        $trains = Train::all();

        return view ('trains', compact('trains'));
    }
}
