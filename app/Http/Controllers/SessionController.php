<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(): View|Factory|Application
    {
        return view('auth.login');

    }

    /**
     * @throws ValidationException
     */
    public function store(): Application|Redirector|RedirectResponse
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
       if(! Auth::attempt($attributes)){
           throw ValidationException::withMessages([
               'email' => __('auth.failed')
           ]);

       }
       request()->session()->regenerate();

       return redirect(route('home'));

    }

    public function destroy(): Application|Redirector|RedirectResponse
    {
        Auth::logout();
        return redirect(route('login'));


    }

}
