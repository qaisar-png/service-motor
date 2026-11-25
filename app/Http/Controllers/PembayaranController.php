<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    private function rules()
    {
        return [
            'id_servis'        => 'required|exists:daftar_service,id_servis',
            'jumlah_biaya'     => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
            'keterangan'       => 'nullable|string',
        ];
    }

    public function index()
    {
        $data = Pembayaran::with('daftarService.pelanggan')->get();
        return view('pembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('pembayaran.create', [
            'servis' => DaftarService::all(),
        ]);
    }

    public function store(Request $request)
    {
        Pembayaran::create($request->validate($this->rules()));
        return redirect()->route('pembayaran.index')->with('ok', 'Pembayaran disimpan');
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', [
            'pembayaran' => $pembayaran,
            'servis'     => DaftarService::all(),
        ]);
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update($request->validate($this->rules()));
        return redirect()->route('pembayaran.index')->with('ok', 'Pembayaran diperbarui');
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load('daftarService.kendaraan', 'daftarService.pelanggan');
        return view('pembayaran.show', compact('pembayaran'));
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return back()->with('ok', 'Pembayaran dihapus');
    }
}
