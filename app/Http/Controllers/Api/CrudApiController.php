<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CrudApiController extends Controller
{
    protected string $model;
    protected array $with = [];

    abstract protected function rules(?string $id = null): array;

    public function index()
    {
        return response()->json([
            'data' => $this->model::with($this->with)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $row = $this->model::create($request->validate($this->rules()));
        return response()->json([
            'message' => 'Data berhasil dibuat',
            'data'    => $row->load($this->with),
        ], 201);
    }

    public function show($id)
    {
        return response()->json([
            'data' => $this->model::with($this->with)->findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $row = $this->model::findOrFail($id);
        $row->update($request->validate($this->rules($id)));
        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data'    => $row->load($this->with),
        ]);
    }

    public function destroy($id)
    {
        $this->model::findOrFail($id)->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
