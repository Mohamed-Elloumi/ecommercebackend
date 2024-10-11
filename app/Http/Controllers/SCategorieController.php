<?php

namespace App\Http\Controllers;

use App\Models\sCategorie;
use Illuminate\Http\Request;

class SCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $scategories=sCategorie::with('categorie')->get(); // Inclut la catégorie liée;
        return response()->json($scategories,200);
        } catch (\Exception $e) {
        return response()->json("Sélection impossible {$e->getMessage()}");
        
    }}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $scategorie=new sCategorie([
            "nomscategorie"=>$request->input("nomscategorie"),
            "imagescategorie"=>$request->input("imagescategorie"),
            "categorieID"=>$request->input("categorieID")
            ]);
            $scategorie->save();
            return response()->json($scategorie);
            
            
            } catch (\Exception $e) {
            return response()->json("insertion impossible {$e->getMessage()}");
            }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $scategorie=sCategorie::with('categorie')->findOrFail($id);
            return response()->json($scategorie);
            } catch (\Exception $e) {
            return response()->json("Sélection impossible {$e->getMessage()}");
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $scategorie=sCategorie::findorFail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie);
            } catch (\Exception $e) {
            return response()->json("Modification impossible {$e->getMessage()}");
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $scategorie=sCategorie::findOrFail($id);
            $scategorie->delete();
            return response()->json("Sous catégorie supprimée avec succes");
            } catch (\Exception $e) {
            return response()->json("Suppression impossible {$e->getMessage()}");
            }
    }
}
