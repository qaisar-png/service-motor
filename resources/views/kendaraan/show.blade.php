@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('kendaraan.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
        <h2 class="text-xl font-semibold text-gray-900">Detail Kendaraan</h2>
    </div>

    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">No Plat Kendaraan</p>
                <p class="text-sm text-gray-900 font-medium uppercase">{{ $kendaraan->no_plat }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Jenis Kendaraan</p>
                <p class="text-sm text-gray-900">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        {{ $kendaraan->jenis_kendaraan }}
                    </span>
                </p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">No STNK</p>
                <p class="text-sm text-gray-900">{{ $kendaraan->no_stnk }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Tahun Pembuatan</p>
                <p class="text-sm text-gray-900">{{ $kendaraan->tahun_pembuatan }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Nama Pemilik</p>
                <p class="text-sm text-gray-700">{{ $kendaraan->nama_pemilik }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Warna</p>
                <p class="text-sm text-gray-700 capitalize">{{ $kendaraan->warna }}</p>
            </div>
        </div>

        <div class="mt-6 pt-2 flex items-center gap-3">
            <a href="{{ route('kendaraan.edit', $kendaraan->no_plat) }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Ubah Data</a>
            <a href="{{ route('kendaraan.index') }}" class="text-gray-500 hover:text-gray-700 text-sm ml-auto">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection