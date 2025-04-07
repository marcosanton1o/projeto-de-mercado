<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()

    {

        if (Auth::check()) {

            $cargo = Auth::user()->cargo;

        } else {

            $cargo = null;

        }


        return view('auth.login', compact('cargo'));

    }
}
