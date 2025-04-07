<?php

namespace App\Http\Controllers;

use App\Models\Sugestao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SugestaoController extends Controller
{
    public readonly Sugestao $sugestao;

    public function __construct()
    {
    $this->sugestao = new Sugestao();
    }

    public function index()
    {
        $postoId = Auth::user()->posto_id_posto;

        $users = User::where('posto_id_posto', $postoId)->with('sugestoes')->get();

        return view('sugestoes', ['users' => $users]);
    }
    public function create()
    {

    return view('sugestoes_past.Criar');

    }
    public function store(Request $request)
    {
$created = $this->sugestao->create([
            'titulo' => 'required|string|max:30',
            'descricao' => 'required|string|max:250',
        ]);

        Sugestao::create([
            'sugestao_id_user' => Auth::id(),
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
        ]);

        return redirect()->route('sugestaoindex')->with('criado','g');
    }
    public function show($id)

    {

    }

    public function edit(Sugestao $sugestao)
    {
        return view('sugestoes_past.Editar', ['sugestao' => $sugestao]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:30',
            'descricao' => 'required|string|max:250',
        ]);

        $sugestao = $this->sugestao->where('id_sugestao', $id)->first();
        if (!$sugestao) {
            return redirect()->back()->withErrors('Sugestão não encontrada.');
        }

        $sugestao->update($validated);

        return redirect()->route('sugestaoindex')->with('editado','m');

    }

    public function destroy(string $id)
    {
        $this->sugestao->where('id_sugestao', $id)->delete();

    return redirect()->route('sugestaoindex')->with('apagado','apagado');
    }
}
