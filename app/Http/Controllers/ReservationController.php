<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Evenement;
use Illuminate\Http\Request;

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
            'email'=> $request->input('email'),
            'nombre_place'=> $request->input('nombre_place'),
            'even_id' => $request->input('even_id'),

            'user_id' => auth()->user()->id,
    ]);
        $reservation->save();

        return back()->with('success', 'Votre Reservation a eté bien prise en charge veille verifier votre email ');

    }



    public function ListeReservation($id)
    {
        $reservations = Reservation:: where('even_id',$id)->get();
        return view('reservation.liste', compact('reservations'));
    }

    public function updateReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->accepter = 'refuser';
        if ($reservation->update()) 
        {
            return back()->with( "Vous avez réfuser la demande de la réservation");
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
