<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voiture;


class ParcController extends Controller
{
    public function index(){	
    	

    	return view('parc.index');

    }


    
}
