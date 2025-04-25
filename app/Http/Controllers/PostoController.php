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

        $postoId = $postos->first()->id ?? null;

        $userController = new UserController();

        $users = $userController->index($postoId)->getData()['users'];

return view('postos', [
    'postos' => $postos,

    'users' => $users
]);

    }


    public function store(StorePostoRequest $request)
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

    public function update(UpdatePostoRequest $request, $id)
    {

        $atualizar = $this->posto->where('id_posto', $id)->update($request->except(['_token', '_method']));
        if ($atualizar) {
            return redirect()->back()->with('editado');
        }

    }

    public function destroy(string $id)
    {
        $this->posto->where('id_posto', $id)->delete();

    return redirect()->route('postoindex')->with('apagado','apagado');
    }
}
