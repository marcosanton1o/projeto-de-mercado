<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corrida;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Requests\StoreCorridaRequest;

class CorridaController extends Controller
{
    public readonly Corrida $corrida;

    public function __construct()
    {
    $this->corrida = new Corrida();
    }

    public function index()
    {
        $user = Auth::user();

        $corridas = $user->corridas;

        return view('registro_corrida', ['corridas' => $corridas]);
    }
    public function create()
    {

    return view('corridas_past.Criar');

    }
    public function store(StoreCorridaRequest $request)
    {
        Corrida::create([
            'corrida_user' => Auth::id(),
            'nome_cliente' => $request->input('nome_cliente'),
            'data' => $request->input('data'),
            'preco' => $request->input('preco'),
        ]);

        return redirect()->route('corridaindex')->with('criado', 'im');
    }
    public function show($id)

    {

    }

    public function edit(Corrida $corrida)
{
    return view('corridas_past.Editar', ['corrida' => $corrida]);
}

public function update(Request $request, $id)
{

    $updated=$this->corrida->where('id_registro_corrida',$id)->update($request->except(['_token','_method']));

    return redirect()->route('corridaindex')->with('editado', 'm');
}


    public function destroy(string $id)
    {
        $this->corrida->where('id_registro_corrida', $id)->delete();

    return redirect()->route('corridaindex')->with('apagado','g');;
    }
}


