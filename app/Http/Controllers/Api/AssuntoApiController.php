<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assunto;
use Illuminate\Http\Request;

class AssuntoApiController extends Controller
{
    public function index()
    {
        return response()->json(Assunto::paginate(15));
    }

    public function store(Request $request)
    {
        $assunto = Assunto::create($request->all());
        return response()->json($assunto, 201);
    }

    public function show($id)
    {
        return response()->json(Assunto::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $assunto = Assunto::findOrFail($id);
        $assunto->update($request->all());
        return response()->json($assunto);
    }

    public function destroy($id)
    {
        $assunto = Assunto::findOrFail($id);
        $assunto->delete();
        return response()->json(null, 204);
    }
}