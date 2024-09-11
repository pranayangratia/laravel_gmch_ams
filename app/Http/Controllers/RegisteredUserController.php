<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RegisteredUserController extends Controller
{
    public function create(): View|Factory|Application
    {
        return view('auth.register');


    }

    public function store()
    {
        //validate

        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:student,professor'],


        ]);



        //create
        $user = User::create($attributes);
        //login
        Auth::login($user);
        //redirect
        return redirect(route('home'));


    }


}
