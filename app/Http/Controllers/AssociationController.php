<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index()
    {
        return view('association.accueil');
    }
}
