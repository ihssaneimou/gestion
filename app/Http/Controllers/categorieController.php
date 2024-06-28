<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\categories;
use App\Models\entres;
use App\Models\sorties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller 
{
    public function index(){
        $categories = categories::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|min:3|string',
        ]);
       
        $categorie = new Categories();
        $categorie->nom = $validatedData['nom'];
        $categorie->save();

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function edit(categories $categories)
{
    return view('categories.edit', ['categorie' => $categories]);
}

    public function update(Request $request, Categories $categorie) {
        $validatedData = $request->validate([
            'nom' => 'required|min:3|string',
        ]);
        $categorie->nom = $validatedData['nom'];
        $categorie->save();

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function entre_sortie(categories $categories ){

        $entres = entres::select('entres.*')
        ->join('marchandises', 'entres.id_mar', '=', 'marchandises.id_mar')
        ->join('categoriess', 'entres.id_cat', '=', 'categoriess.id_cat')
        ->where('categoriess.id_cat', $categories)
        ->orderBy('entres.date_doc', 'desc')                  
        ->get();

        $sorties = sorties::select('sorties.*')
        ->join('marchandises', 'sorties.id_mar', '=', 'marchandises.id_mar')
        ->join('categoriess', 'sorties.id_cat', '=', 'categoriess.id_cat')
        ->where('categoriess.id_cat', $categories)
        ->orderBy('sorties.date_doc', 'desc')                  
        ->get();

        $tous = $entres->merge($sorties);
        $tous = $tous->sortByDesc('date_doc');

        return view('categories.entre_sortie', ['tous' => $tous,'entres'=>$entres , 'sorties'=>$sorties]);
        

    }

    public function delete(Categories $categorie) {
        try {
            $categorie->delete();
            return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
        } catch (Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Erreur lors de la suppression de la catégorie.');
        }
    }
}
