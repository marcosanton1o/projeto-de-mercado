<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aviso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class AvisoController extends Controller
{
    public readonly Aviso $aviso;

    public function __construct()
    {
    $this->aviso = new Aviso();
    }

    public function index()
    {
        $postoId = Auth::user()->posto_id_posto;

        $users = User::where('posto_id_posto', $postoId)->with('avisos')->get();

        return view('aviso', ['users' => $users]);
    }
    public function create()
    {

    return view('aviso_past.Criar');

    }
    public function store(Request $request)
    {
        $created = $this->aviso->create([
            'titulo' => $request->input('titulo'),
            'conteudo' => $request->input('conteudo'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('avisoindex')->with('criado', 'mu');
    }
    public function show($id)

    {

    }

    public function edit(Aviso $aviso)
{
    return view('aviso_past.Editar', ['aviso' => $aviso]);
}

public function update(Request $request, $id)
{
    $updated=$this->aviso->where('id_aviso',$id)->update($request->except(['_token','_method']));

    return redirect()->route('avisoindex')->with('editado', 'nn');
}

    public function destroy(string $id)
    {
        $this->aviso->where('id_aviso', $id)->delete();

    return redirect()->route('avisoindex')->with('apagado','g');;
}
}
