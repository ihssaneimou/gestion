<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\marchandises;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class marchandiseController extends Controller
{
    public function index(){
        $marchandise = marchandises::all();
        return view('marchandises.index', ['marchandises'=>$marchandise]);
    }

   
    public function create() {
        return View('marchandises.create',['categorie'=>categories::all()]);
    }
    public function store(Request $request){
        $valid = $request->validate([
            'nom'=>'required|min:3|string',
            'barre_code'=>'integer|nullable',
            'description'=>'string|nullable',
            'quantite'=>'integer|nullable',
            'unite'=>'string|nullable',
            // 'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:3000',
            'categorie'=>'exists:categories,id'
        ]);
        $marchandise = new marchandises();
        $marchandise->nom=$valid['nom'];
        $marchandise->barre_code=$valid['barre_code'];
        $marchandise->description=$valid['description'];
        $marchandise->quantite=$valid['quantite'];
        $marchandise->unite=$valid['unite'];
        if ($request->file('image') != null) {
            $marchandise->image =  $request->file('image')->store('logos', 'public');
        }
        $marchandise->id_cat=$valid['categorie'];
        $marchandise->save();
        return redirect('/marchandises')->with('success','marchandise ajouter avec success');
    }
    public function edit(marchandises $marchandises) {
        return View('marchandises.edit',['marchandise'=>$marchandises,'categorie'=>categories::all()]);
    }

    public function update(Request $request,marchandises $marchandise )
    {
        $valid = $request->validate([
        'nom'=>'required|min:3|string',
        'barre_code'=>'integer',
        'description'=>'string|min:50',
        'quantite'=>'integer',
        'unite'=>'string',
        'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:3000',
         'id_cat'=>'required|exists:categories,id'
        ]);
            $marchandise->nom=$valid['nom'];
            $marchandise->barre_code=$valid['barre_code'];
            $marchandise->description=$valid['description'];
            $marchandise->quantite=$valid['quantite'];
            $marchandise->unite=$valid['unite'];
            $marchandise->image=$valid['image'];
            $marchandise->id_cat=$valid['id_cat'];
            $marchandise->save();
        return redirect('/marchandises')->with('success', 'marchandise modifier  avec success');
    }

    public function delete(Request $request) {
                $marchandise = marchandises::find($request->id);
               $marchandise->delete();
        return redirect('/marchandises')->with('success','marchandise supprimer  avec success');
   }
}
