<?php

namespace App\Http\Controllers;
use App\Models\Posto;
use Illuminate\Http\Request;

class Admin_postController extends Controller
{
    public function index()

    {

        $totalPostos = Posto::count();
        return view('admin_post', compact('totalPostos'));

    }
}
