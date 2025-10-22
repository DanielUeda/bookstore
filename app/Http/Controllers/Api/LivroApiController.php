<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LivroService;
use Illuminate\Http\Request;

class LivroApiController extends Controller
{
    public function __construct(private LivroService $service) {}

    public function index()
    {
        return response()->json($this->service->listar(15));
    }

    public function store(Request $request)
    {
        $livro = $this->service->criar($request->all());
        return response()->json($livro, 201);
    }

    public function show($id)
    {
        return response()->json($this->service->obter($id));
    }

    public function update(Request $request, $id)
    {
        $livro = $this->service->obter($id);
        $livro = $this->service->atualizar($livro, $request->all());
        return response()->json($livro);
    }

    public function destroy($id)
    {
        $livro = $this->service->obter($id);
        $this->service->remover($livro);
        return response()->json(null, 204);
    }
}