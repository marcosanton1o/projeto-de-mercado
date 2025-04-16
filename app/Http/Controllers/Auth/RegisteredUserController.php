<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisteredRequest;
use App\Models\Posto;
use App\Models\Corrida;
use App\Models\Sugestao;
use App\Models\User;
use Routes\web;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Controllers\Controller\Admin_postController;

class RegisteredUserController extends Controller
{


    public function create()

    {

        if (Auth::check()) {
            $cargo = Auth::user()->cargo;
        }

        $postos = Posto::all();



        return view('auth.register', [

            'postos' => $postos,
        ]);


    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreRegisteredRequest $request): RedirectResponse
{
    $posto_id_posto = $request->input('posto_id_posto', false);

    $cargo = $request->input('cargo');



    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'cpf' => $request->cpf,
        'posto_id_posto' => $request->posto_id_posto,
        'numero_tel' => $request->numero_tel,
        'placa_carro' => $request->placa_carro,
        'cargo' => $request->cargo,
        'data_nascimento' => $request->data_nascimento,
    ]);
    event(new Registered($user));

    Auth::login($user);
    $request->session()->regenerate();

    if ($cargo == 1) {
        return redirect()->route('admin_postindex')->with('success', 'Seja bem vindo!');
    } elseif ($cargo == 2) {
        return redirect()->route('adminindex')->with('success', 'Seja bem vindo!');
    } elseif ($cargo == 3) {
        return redirect()->route('user')->with('success', 'Seja bem vindo!');
    } else {
        return redirect('/');
    }

}

}




