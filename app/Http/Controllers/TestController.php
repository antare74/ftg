<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function fibonacci(Request $request)
    {
        return make_fibonacci($request->input('number'));
    }

    public function factorial(Request $request)
    {
        return make_factorial($request->input('number'));
    }

    public function palindrome(Request $request)
    {
        return is_palindrome($request->input('word'));
    }
}
