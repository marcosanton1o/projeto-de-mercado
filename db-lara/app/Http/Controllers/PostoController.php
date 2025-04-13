<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Posto;
use App\Http\Controllers\UserController;

class PostoController extends Controller
{
public readonly Posto $posto;

public function __construct()
{
    $this->posto = new Posto();
}

    public function index()
    {
    $user = Auth::user();

    $postos = $this->posto->where('id_posto', $user->posto_id_posto)->get();

    return view('postos',['postos' => $postos]);
    }

    public function store(Request $request)
    {
$created = $this->posto->create([
            'id_posto' => 'required|string|max:30',
            'local_cidade' => 'required|string|max:250',
            'numero_tel_posto' => 'required|string|max:250',
            'local_estado' => 'required|string|max:250',
            'cep' => 'required|string|min:8|max:15',
        ]);

        Posto::create([
            'posto_id_posto' => Auth::id(),
            'local_cidade' => $request->input('local_cidade'),
            'numero_tel_posto' => $request->input('numero_tel_posto'),
            'cep' => $request->input('cep'),
            'local_estado' => $request->input('local_estado'),
        ]);

        return redirect()->route('postocreate')->with('criado','g');
    }
    public function show($id)

    {

    }

    public function edit(Posto $posto)
    {
        return view('sugestoes_past.edit', ['posto' => $posto]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_posto' => 'required|string|max:30',
            'local_cidade' => 'required|string|max:250',
            'numero_tel_posto' => 'required|string|max:250',
            'local_estado' => 'required|string|max:250',
            'cep' => 'required|string|min:8|max:15',
        ]);

        $posto = $this->sugestao->where('id_posto', $id)->first();
        if (!$posto) {
            return redirect()->back()->withErrors('Posto não encontrada.');
        }

        $posto->update($validated);

        return redirect()->route('postoindex')->with('editado','m');

    }

    public function destroy(string $id)
    {
        $this->posto->where('id_posto', $id)->delete();

    return redirect()->route('postoindex')->with('apagado','apagado');
    }
}

