<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\marchandises;
use Illuminate\Http\Request;

class rapportController extends Controller
{

    public function index(){
        $marchandises = marchandises::all();
        
        return view('rapports.index', compact('marchandises'));
    }

    public function search(Request $request)  {
        $search=$request->search;
        $marchandises = marchandises::where('nom', 'LIKE',$search);
        return view('rapports.index', compact('marchandises'));

    }

}