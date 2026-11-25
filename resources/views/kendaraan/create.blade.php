@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Tambah Data Kendaraan</h2>
    <form action="{{ route('kendaraan.store') }}" method="POST" class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm space-y-4">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No Plat Kendaraan <span class="text-red-500">*</span></label>
                <input type="text" name="no_plat" value="{{ old('no_plat') }}" placeholder="B 1234 ABC" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none uppercase" required>
                @error('no_plat') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex flex-col justify-end">
                <label class="block text-sm font-medium text-gray-700 mb-3">Jenis Kendaraan <span class="text-red-500">*</span></label>
                <div class="space-y-2">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_kendaraan" value="Matic" {{ (old('jenis_kendaraan') === 'Matic') ? 'checked' : '' }} class="rounded text-indigo-600 focus:ring-indigo-500" required>
                        <span class="text-sm font-medium text-gray-700">Matic</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="jenis_kendaraan" value="Manual Transmisi" {{ (old('jenis_kendaraan') === 'Manual Transmisi') ? 'checked' : '' }} class="rounded text-indigo-600 focus:ring-indigo-500" required>
                        <span class="text-sm font-medium text-gray-700">Manual Transmisi</span>
                    </label>
                </div>
                @error('jenis_kendaraan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No STNK <span class="text-red-500">*</span></label>
                <input type="text" name="no_stnk" value="{{ old('no_stnk') }}" placeholder="Nomor STNK" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                @error('no_stnk') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun Pembuatan <span class="text-red-500">*</span></label>
                <input type="number" name="tahun_pembuatan" value="{{ old('tahun_pembuatan') }}" min="1900" max="2100" placeholder="2020" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                @error('tahun_pembuatan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik <span class="text-red-500">*</span></label>
                <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" placeholder="Nama pemilik kendaraan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                @error('nama_pemilik') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Warna Kendaraan <span class="text-red-500">*</span></label>
                <input type="text" name="warna" value="{{ old('warna') }}" placeholder="Merah" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                @error('warna') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="pt-2 flex items-center gap-3">
            <a href="{{ route('kendaraan.index') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium transition shadow-sm ml-auto">Simpan</button>
        </div>
    </form>
</div>
@endsection
