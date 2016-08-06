<?php

namespace App\Http\Controllers;

use App\SignUp;
use App\Http\Requests;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $signup = new SignUp($request->all());
        $signup->save();
        return redirect('/thank-you');
    }

    public function thankYou()
    {
        return view('thank-you');
    }
}
