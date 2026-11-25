@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Ubah Data Pelanggan</h2>
    <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST" class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm space-y-4">
        @csrf @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}" placeholder="Masukkan nama lengkap" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                @error('nama_lengkap') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No HP <span class="text-red-500">*</span></label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $pelanggan->no_hp) }}" placeholder="08123456789" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                @error('no_hp') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Pelanggan <span class="text-red-500">*</span></label>
            <textarea name="alamat" rows="3" placeholder="Masukkan alamat lengkap" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
            @error('alamat') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan <span class="text-red-500">*</span></label>
            <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $pelanggan->pekerjaan) }}" placeholder="Masukkan pekerjaan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
            @error('pekerjaan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="pt-2 flex items-center gap-3">
            <a href="{{ route('pelanggan.index') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium transition shadow-sm ml-auto">Perbarui</button>
        </div>
    </form>
</div>
@endsection
