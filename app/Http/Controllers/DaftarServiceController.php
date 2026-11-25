<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    private function rules()
    {
        return [
            'no_plat'        => 'required|exists:kendaraan,no_plat',
            'id_pelanggan'   => 'required|exists:pelanggan,id_pelanggan',
            'keluhan'        => 'required|string',
            'tanggal_servis' => 'required|date',
        ];
    }

    // Tabel daftar service (with() supaya plat & nama pelanggan ikut dimuat)
    public function index()
    {
        $data = DaftarService::with(['kendaraan', 'pelanggan'])->get();
        return view('daftar_service.index', compact('data'));
    }

    // Form tambah: kirim data untuk dropdown plat & dropdown pelanggan
    public function create()
    {
        return view('daftar_service.create', [
            'kendaraan' => Kendaraan::all(),
            'pelanggan' => Pelanggan::all(),
        ]);
    }

    public function store(Request $request)
    {
        DaftarService::create($request->validate($this->rules()));
        return redirect()->route('daftar-service.index')->with('ok', 'Daftar service disimpan');
    }

    // Form edit: dropdown tetap dikirim, ditambah data yang mau diedit
    public function edit(DaftarService $daftarService)
    {
        return view('daftar_service.edit', [
            'daftarService' => $daftarService,
            'kendaraan'     => Kendaraan::all(),
            'pelanggan'     => Pelanggan::all(),
        ]);
    }

    public function update(Request $request, DaftarService $daftarService)
    {
        $daftarService->update($request->validate($this->rules()));
        return redirect()->route('daftar-service.index')->with('ok', 'Daftar service diperbarui');
    }

    public function show(DaftarService $daftarService)
    {
        $daftarService->load(['kendaraan', 'pelanggan']);
        return view('daftar_service.show', compact('daftarService'));
    }

    public function destroy(DaftarService $daftarService)
    {
        $daftarService->delete();
        return back()->with('ok', 'Daftar service dihapus');
    }
}
