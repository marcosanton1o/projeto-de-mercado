<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;
use App\Http\Controllers\UserController;

class PostoController extends Controller
{
    public function index()

    {
        $postos = Posto::all();

        $postoId = $postos->first()->id ?? null;

        $userController = new UserController();

        $users = $userController->index($postoId)->getData()['users'];

        return view('postos', [

            'postos' => $postos,

            'users' => $users

        ]);
    }

}
