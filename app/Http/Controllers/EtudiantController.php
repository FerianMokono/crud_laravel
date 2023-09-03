<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function liste_etudiant(){
        $etudiants = Etudiant::paginate(4);
        return view('Etudiant.liste_etudiant', compact('etudiants'));
    }

    public function ajouter_etudiant(){
        return view('Etudiant.ajouter');
    }
    // Enregister des element base de donnée
    public function ajouter_etudiant_traitement(Request $request)
    {
        // verifier les different champ qui dans la base de donnée
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);
// lier les élément dans le model
        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->save();
        // permet de rediriger la pge sur la meme page
        return redirect('/ajouter')->with('statut', 'L\'étudiant à bien été  ajouter');
    }

    // Modifier les élément

    public function update_etudiant($id)
    {   $etudiants = Etudiant::find($id);

        return view('Etudiant.update', compact('etudiants'));
    }

    public function update_etudiant_traitement(request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant =  Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->update();

        return redirect('/etudiant')->with('statut', 'L\'étudiant à bien été  modifier avec success');
    }

    public function delete_etudiant($id){
        $etudiant = Etudiant::find($id);
        $etudiant->delete();

        return redirect('/etudiant')->with('statut', 'L\'étudiant à bien été  Supprimre avec success');
    }
}
