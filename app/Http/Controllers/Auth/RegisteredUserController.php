<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register', [
            'title' => 'register'
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => ['required', 'min:15', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'telp' => ['required', 'min:10'],
            'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()->mixedCase()],
        ]);
        $validate['level'] = 'masyarakat';
        $validate['password'] = Hash::make($request->password);
        User::create($validate);

        return redirect('/login')->with('success', 'Success for register! Login now!!');
    }
}
