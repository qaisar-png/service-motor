<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    private function rules()
    {
        return [
            'nama_lengkap' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:20',
            'alamat'       => 'required|string',
            'pekerjaan'    => 'required|string|max:100',
        ];
    }

    public function index()
    {
        return view('pelanggan.index', ['data' => Pelanggan::all()]);
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        Pelanggan::create($request->validate($this->rules()));
        return redirect()->route('pelanggan.index')->with('ok', 'Data pelanggan disimpan');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->validate($this->rules()));
        return redirect()->route('pelanggan.index')->with('ok', 'Data pelanggan diperbarui');
    }

    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return back()->with('ok', 'Data pelanggan dihapus');
    }
}
