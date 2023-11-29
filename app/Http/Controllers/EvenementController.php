<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{

    public function ListeEven()
    {
        $evens = Evenement::all();
        return view('evenement.liste', compact('evens'));
    }
    public function ajout()
    {
        return view("evenement.ajout");
    }

    public function create(Request $request)
    {

// dd($request);
        $request->validate([
            'libelle' => 'required',
            'date_limite' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,avif',
            'lieu' => 'required',
            'cloture' => 'required',
            'date_env' => 'required',
        ]);

        $even = new Evenement();
        $even->libelle = $request->get('libelle');
        $even->date_limite = $request->get('date_limite');
        $even->description = $request->get('description');
        $even->image = $this->storeImage($request->file('image'));
        $even->lieu = $request->get('lieu');
        $even->cloture = $request->get('cloture');
        $even->date_env = $request->get('date_env');

        $even->user_id = auth()->user()->id;
        $even->save();
        return redirect('/liste');

        // pour l'envoie de email
        // if ($even->save()) {
        //     $users=User::where('role', 'user')->get();
        //     foreach($users as $user){
        //         $user->notify(new EnvoiEmail());
        //     }
           
        //     return redirect('/biens/liste');
        // } else {
        //     return 'bonjour';
        // }
}

private function storeImage($image): string
{
    return $image->store('images', 'public');
}


public function destroy($id)
{
    $viens = Evenement::find($id);
    if ($viens->delete()) {
        return redirect('/liste');
    }
}

public function edit($id)
{
    $even = Evenement::find($id);
    return view('evenement.modifie', compact('even'));
}

/**
 * Remove the specified resource from storage.
 */
public function update(Request $request)
{
    $evenreq = $request->validate([
            'libelle' => 'required',
            'date_limite' => 'required',
            'description' => 'required',
            'lieu' => 'required',
            'cloture' => 'required',
            'date_env' => 'required',
    ]);
    $even = Evenement::find($request->id);
    $even->libelle = $request->get('libelle');
    $even->date_limite = $request->get('date_limite');
    $even->description = $request->get('description');
    if ($request->hasFile('image')) {
        # code...
        $even->image = $this->storeImage($request->file('image'));
    }
    $even->lieu = $request->get('lieu');
    $even->cloture = $request->get('cloture');
    $even->date_env = $request->get('date_env');

    $even->Update();
    return redirect('/liste');
}


}