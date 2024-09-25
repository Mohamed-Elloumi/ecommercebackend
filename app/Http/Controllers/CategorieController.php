<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
   
   
    public function index()
    {
        try{
            $categories=categorie ::all();
            return response()->json($categories);
        }catch(\Exception $e){
            return response()->json("impossiblle d'aficher la liste");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $categorie = new Categorie([
            "nomcategorie" => $request->input("nomcategorie"),
            "imagecategorie" => $request->input("imagecategorie")
        ]);
        $categorie->save();
        return response()->json($categorie);
    } catch(\Exception $e) {
        return response()->json("probléme d'ajout");
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Categorie $id)
    {
    try {
        $categorie=Categorie::findOrFail($id);
        return response()->json($categorie);
    }catch(\Exception $e){    return response()->json("probléme d'affichage");}

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {  
        try {  
            $categorie =Categorie::findOrFail($id);
            $categorie->update($request->all);
            return response()->json(" categorie modifiée avec succes") ;
    }catch (\Exception $e){
        return response()->json("Modification impossible");
}     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {  
            $categorie =Categorie::findOrFail($id);
            $categorie->delete();
            return response()->json(" categorie supprimée avec succes") ;
    }catch (\Exception $e){
        return response()->json("Suppression impossible");
}}}
