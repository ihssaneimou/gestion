<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\categories;
use App\Models\entres;
use App\Models\marchandises;
use App\Models\sorties;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategorieController extends Controller 
{
    public function index(){
        $categories = categories::select('categories.nom','categories.id', DB::raw('COALESCE(SUM(acheters.quantite), 0)-COALESCE(SUM(vendres.quantite), 0) as total_achetes'), DB::raw('COALESCE(SUM(vendres.quantite), 0) as total_vendus'))
                        ->leftJoin('marchandises', 'marchandises.id_cat', '=', 'categories.id')
                        ->leftJoin('acheters', 'acheters.id_mar', '=', 'marchandises.id')
                        ->leftJoin('vendres', 'vendres.id_mar', '=', 'marchandises.id')
                        ->groupBy('categories.id', 'categories.nom')
                        ->get();

return view('categories.index', compact('categories'));

    }

    public function index_cat(){
        $categories = categories::all();
        return view('categories.index_cat', compact('categories'));
    }

    public function index_mar(categories $categories){
        $marchandise = marchandises::where('id_cat','=',$categories->id)->get();
       
        return view('categories.index_mar', ['marchandises'=>$marchandise]);
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

        return redirect()->route('categories.index_cat')->with('success', 'Catégorie ajoutée avec succès.');
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

    public function entre_sortie(categories $categories) {
        // Récupérer les entres en ajoutant une colonne 'type' avec la valeur 'entre'
        $entres = entres::select('entres.*', DB::raw('"entre" as type'))
            ->where('entres.id_cat', $categories->id)
            ->orderBy('entres.date_doc', 'desc')                  
            ->get();
    
        // Récupérer les sorties en ajoutant une colonne 'type' avec la valeur 'sortie'
        $sorties = sorties::select('sorties.*', DB::raw('"sortie" as type'))
            ->where('sorties.id_cat', $categories->id)
            ->orderBy('sorties.date_doc', 'desc')                  
            ->get();
    
        // Fusionner les collections d'entres et de sorties
        $tous = $entres->concat($sorties);
    
        // Trier toutes les données ensemble par date de document en ordre décroissant
        $tous = $tous->sort(function ($a, $b) {
            $comp = strcmp($b->date_doc, $a->date_doc); // Tri décroissant par 'date_doc'
            if ($comp === 0) {
                return strcmp($b->created_at, $a->created_at); // Si égaux, tri décroissant par 'created_at'
            }
            return $comp;
        });
        
        // Retourner la vue avec toutes les données nécessaires
        return view('categories.entre_sortie', [
            'categories' => $categories,
            'tous' => $tous,
            'entres' => $entres, 
            'sorties' => $sorties
        ]);
    }
    
    public function entre(categories $categories ){

        $entres = entres::select('entres.*', DB::raw('"entre" as type'))
        ->where('entres.id_cat', $categories->id)
        ->orderBy('entres.date_doc', 'desc')                  
        ->get();
  

        $sorties = sorties::select('sorties.*', DB::raw('"sortie" as type'))
        ->where('sorties.id_cat', $categories->id)
        ->orderBy('sorties.date_doc', 'desc')                  
        ->get();

        $tous = $entres->merge($sorties);
        $tous = $tous->sortByDesc('date_doc');

        return view('categories.entre', ['categories'=>$categories,'tous' => $tous,'entres'=>$entres , 'sorties'=>$sorties]);

        
    }
    public function sortie(categories $categories ){

        $entres = entres::select('entres.*', DB::raw('"entre" as type'))
        ->where('entres.id_cat', $categories->id)
        ->orderBy('entres.date_doc', 'desc')                  
        ->get();

        $sorties = sorties::select('sorties.*', DB::raw('"sortie" as type'))
        ->where('sorties.id_cat', $categories->id)
        ->orderBy('sorties.date_doc', 'desc')                  
        ->get();

        $tous = $entres->merge($sorties);
        $tous = $tous->sortByDesc('date_doc');

        return view('categories.sortie', ['categories'=>$categories,'tous' => $tous,'entres'=>$entres , 'sorties'=>$sorties]);
    }
    

    public function delete(Request $request) {
        try {
            $categorie=categories::find($request->id);
            $categorie->delete();
            return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
        } catch (Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Erreur lors de la suppression de la catégorie.');
        }
    }
}
