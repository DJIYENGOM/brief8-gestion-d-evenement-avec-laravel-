<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Evenement;
use App\Models\User;
use App\Notifications\MonEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{

    public function CreerReservation(Request $request)
    {

        // dd($request);
        $request->validate([
            'email' => 'required',
            'nombre_place' => 'required',
            'user_id' => 'required',
            'even_id' => 'required',

        ]);
        $currentDate = now();

        $reservation = new Reservation([
            'email' => $request->input('email'),
            'nombre_place' => $request->input('nombre_place'),
            'even_id' => $request->input('even_id'),

            'user_id' => auth()->user()->id,
        ]);
        $reservation->save();

        // Récupérer l'utilisateur associé à la réservation
        $user = User::find($request->input('user_id'));
                $user->notify(new MonEmail());

        return back()->with('success', 'Votre réservation a été bien prise en charge. Veuillez vérifier votre e-mail.');
    }

    public function ListeReservation($id)
    {
        $reservations = Reservation::where('even_id', $id)->get();
        return view('reservation.liste', compact('reservations'));
    }

    public function updateReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->accepter = 'refuser';
        if ($reservation->update()) {
            return back()->with("Vous avez réfuser la demande de la réservation");
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    
}
