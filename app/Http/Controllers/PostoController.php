<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Posto;
use App\Http\Requests\StorePostoRequest;
use App\Models\User;

class PostoController extends Controller
{
    public readonly Posto $posto;

    public function __construct()
    {
        $this->posto = new Posto();
    }

    public function index()
    {
        $postos = $this->posto->all();


return view('postos', [
    'postos' => $postos,
]);

    }


    public function store(Request $request)
    {
        $created = $this->posto->create([
            'local_cidade' => $request->input('local_cidade'),
            'numero_tel_posto' => $request->input('numero_tel_posto'),
            'cep' => $request->input('cep'),
            'local_estado' => $request->input('local_estado'),
        ]);

        return redirect()->route('postoindex')->with('criado','g');
    }

    public function show($id)

    {

    }

    public function edit(Posto $posto)
    {
        return view('postos', ['posto' => $posto]);
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

        $atualizar = $this->posto->where('id_posto', $id)->update($request->except(['_token', '_method']));
        if ($atualizar) {
            return redirect()->back()->with('Algo deu errado, verifique a página que está .');
        }

    }

    public function destroy(string $id)
    {
        $this->posto->where('id_posto', $id)->delete();

    return redirect()->route('postoindex')->with('apagado','apagado');
    }
}

