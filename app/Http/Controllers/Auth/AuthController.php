<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login_register');
    }

    public function login(Request $request)
    {
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request -> email,
            'password' => $request -> password
        ];

        // $remember = ( $request -> has('remember') ? true : false);

        if(Auth::attempt($credentials))
        {
            $request -> session()->regenerate();

            return redirect() -> intended(route('dashboard')) -> with('status_message','Iniciaste sesión exitosamente.');

        }else
        {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);

            return redirect(route('login'));
        }

    }

    public function register(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = Hash::make($request -> password);
        $user -> save();

        Auth::login($user);


        return redirect(route('dashboard')) -> with('status_message','Iniciaste sesión exitosamente.');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request -> session() ->invalidate();
        $request -> session() ->regenerate();

        session()->flash('status_message','Sesion cerrada exitosamente.');

        return redirect(route('welcome'));
    }
}
