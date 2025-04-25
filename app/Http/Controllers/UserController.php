<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public readonly User $user;

public function __construct()
{
$this->user = new User();
}
    public function index()

        {
            $postoId = Auth::user()->posto_id_posto;

    $users = User::where('posto_id_posto', $postoId)->get();

    $quantidadeMembro = User::where('posto_id_posto', $postoId)->count();

    return view('dashboard', ['users' => $users], compact('quantidadeMembro'));
    }


    public function create()

    {

    return view('admin_past.Criar');

    }


    public function store(Request $request)

    {
    $postoId = Auth::user()->posto_id_posto;

    $created = $this->user->create([
    'name' => $request->input('name'),

    'email' => $request->input('email'),

    'password' => Hash::make($request->input('password')),

    'cpf' => $request->input('cpf'),

    'posto_id_posto' => $postoId,

    'numero_tel' => $request->input('numero_tel'),

    'placa_carro' => $request->input('placa_carro'),

    'cargo' => $request->input('cargo'),

    'data_nascimento' => $request->input('data_nascimento'),

    ]);
    return redirect()->route('postoindex')->with('criado','m');
    }


            public function show($id)

            {

            }


            public function edit(User $user){

                return view('admin_past.adminEdit', ['user' => $user]);

            }


            public function update(Request $request, $id)

            {

                $updated = $this->user->where('id', $id)->update($request->except(['_token','_method']));

                if($updated){
                return redirect()->route('postoindex')->with('editado','editado');
            }
                return redirect()->route('postoindex')->with('error','erro ');

            }


            public function destroy($id)

            {
            $this->user->where('id', $id)->delete();

            return redirect()->route('postoindex')->with('apagado','apagado');
            }
}
