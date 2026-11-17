<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    private function rules()
    {
        return [
            'id_servis'           => 'required|exists:daftar_service,id_servis',
            'estimasi_service'    => 'required|string|max:100',
            'nama_mekanik'        => 'required|string|max:100',
            'sparepart_pengganti' => 'nullable|string|max:255',
        ];
    }

    public function index()
    {
        $data = DataService::with('daftarService.pelanggan')->get();
        return view('data_service.index', compact('data'));
    }

    // Dropdown id servis diambil dari tabel daftar_service
    public function create()
    {
        return view('data_service.create', [
            'servis' => DaftarService::all(),
        ]);
    }

    public function store(Request $request)
    {
        DataService::create($request->validate($this->rules()));
        return redirect()->route('data-service.index')->with('ok', 'Data service disimpan');
    }

    public function edit(DataService $dataService)
    {
        return view('data_service.edit', [
            'dataService' => $dataService,
            'servis'      => DaftarService::all(),
        ]);
    }

    public function update(Request $request, DataService $dataService)
    {
        $dataService->update($request->validate($this->rules()));
        return redirect()->route('data-service.index')->with('ok', 'Data service diperbarui');
    }

    public function destroy(DataService $dataService)
    {
        $dataService->delete();
        return back()->with('ok', 'Data service dihapus');
    }
}
