<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '/testuser';


    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'number' => ['required', 'string', 'max:12'],
            'role' => ['required', 'integer', 'in:1,2'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        // Ajoutez des règles de validation pour les champs spécifiques à l'admin
        if ($data['role'] == '1') {
            $rules['logo'] = ['required', 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', ]; 
            $rules['slogan'] = ['required', 'string', 'max:255'];
            $rules['date'] = ['required', 'date'];

        }

        return Validator::make($data, $rules);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'numero' => $data['number'],
            'role_id' => $data['role'],
            'password' => Hash::make($data['password']),
            'logo' => $data['logo'] ?? null, 
            'slogan' => $data['slogan'] ?? null,
            'date' => $data['date'] ?? null,

        ]);
    }
}
