<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Adicione esta linha

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()

    {

        return view('admin');
    }

}
