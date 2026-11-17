<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KendaraanController extends Controller
{
    private function rules($noPlatLama = null)
    {
        return [
            'no_plat' => [
                'required', 'string', 'max:15',
                Rule::unique('kendaraan', 'no_plat')->ignore($noPlatLama, 'no_plat'),
            ],
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk'         => 'required|string|max:30',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik'    => 'required|string|max:255',
            'warna'           => 'required|string|max:30',
        ];
    }

    public function index()
    {
        return view('kendaraan.index', ['data' => Kendaraan::all()]);
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        Kendaraan::create($request->validate($this->rules()));
        return redirect()->route('kendaraan.index')->with('ok', 'Data kendaraan disimpan');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $kendaraan->update($request->validate($this->rules($kendaraan->no_plat)));
        return redirect()->route('kendaraan.index')->with('ok', 'Data kendaraan diperbarui');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return back()->with('ok', 'Data kendaraan dihapus');
    }
}
