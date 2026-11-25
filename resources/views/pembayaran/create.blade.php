@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Tambah Pembayaran Service</h2>
    <form action="{{ route('pembayaran.store') }}" method="POST" class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Id Servis Pelanggan <span class="text-red-500">*</span></label>
            <select name="id_servis" id="id_servis" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                <option value="">-- Pilih Id Servis Pelanggan --</option>
                @foreach($servis as $s)
                    <option value="{{ $s->id_servis }}" {{ old('id_servis') == $s->id_servis ? 'selected' : '' }}>{{ $s->id_servis }} - {{ $s->keluhan }}</option>
                @endforeach
            </select>
            @error('id_servis') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Biaya Servis <span class="text-red-500">*</span></label>
            <input type="number" name="jumlah_biaya" value="{{ old('jumlah_biaya') }}" min="0" placeholder="Contoh: 150000" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
            @error('jumlah_biaya') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex flex-col justify-end">
            <label class="block text-sm font-medium text-gray-700 mb-3">Jenis Pembayaran <span class="text-red-500">*</span></label>
            <div class="space-y-2">
                <label class="flex items-center gap-2">
                    <input type="radio" name="jenis_pembayaran" value="Cash / Tunai" {{ (old('jenis_pembayaran') === 'Cash / Tunai') ? 'checked' : '' }} class="rounded text-indigo-600 focus:ring-indigo-500" required>
                    <span class="text-sm font-medium text-gray-700">Cash / Tunai</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="jenis_pembayaran" value="Non Tunai" {{ (old('jenis_pembayaran') === 'Non Tunai') ? 'checked' : '' }} class="rounded text-indigo-600 focus:ring-indigo-500" required>
                    <span class="text-sm font-medium text-gray-700">Non Tunai</span>
                </label>
            </div>
            @error('jenis_pembayaran') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
            <textarea name="keterangan" rows="3" placeholder="Catatan tambahan mengenai pembayaran" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">{{ old('keterangan') }}</textarea>
            @error('keterangan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="pt-2 flex items-center gap-3">
            <a href="{{ route('pembayaran.index') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium transition shadow-sm ml-auto">Simpan</button>
        </div>
    </form>
</div>
@endsection
