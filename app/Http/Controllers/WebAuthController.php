<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WebAuthController extends Controller
{
    public function login() : \Illuminate\Http\RedirectResponse
    {
        $credentials = request()->only("email", "password");
        if (!auth()->attempt($credentials)) {
            return redirect()->back()->withErrors([
                "message" => "Invalid credentials"
            ]);
        }
        $user = auth()->user();
        return redirect()
            ->route("home")
            ->with("success", "Hello $user->name, you are logged in!");
    }

    public function logout() : \Illuminate\Http\RedirectResponse
    {
        auth()->logout();
        return redirect()
            ->route("home")
            ->with("success", "You are logged out!");
    }

    public function register() : \Illuminate\Http\RedirectResponse
    {
        $validated = Validator::make(request()->all(), [
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users"],
            "password" => ["required", "string", "min:8", "confirmed"]
        ]);

        if ($validated->fails()) {
            return redirect()
                ->back()
                ->with("error", $validated->errors()->first())
                ->withInput(request()->all());
        }

        $data = request()->only("name", "email", "password");

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"])
        ]);

        auth()->login($user);

        return redirect()
            ->route("home")
            ->with("success", "Hello $user->name, you are registered and logged in!");
    }
}
