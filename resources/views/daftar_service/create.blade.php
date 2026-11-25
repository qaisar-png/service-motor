@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Daftar Service Pelanggan</h2>
    <form action="{{ route('daftar-service.store') }}" method="POST" class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">No Plat Kendaraan <span class="text-red-500">*</span></label>
            <select name="no_plat" id="no_plat" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                <option value="">-- Pilih No Plat Kendaraan --</option>
                @foreach($kendaraan as $k)
                    <option value="{{ $k->no_plat }}" {{ old('no_plat') === $k->no_plat ? 'selected' : '' }}>{{ $k->no_plat }} - {{ $k->nama_pemilik }}</option>
                @endforeach
            </select>
            @error('no_plat') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Id Pelanggan <span class="text-red-500">*</span></label>
            <select name="id_pelanggan" id="id_pelanggan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggan as $p)
                    <option value="{{ $p->id_pelanggan }}" {{ old('id_pelanggan') === $p->id_pelanggan ? 'selected' : '' }}>{{ $p->id_pelanggan }} - {{ $p->nama_lengkap }}</option>
                @endforeach
            </select>
            @error('id_pelanggan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan <span class="text-gray-400 text-xs">(muncul otomatis setelah pilih Id Pelanggan)</span></label>
            <input type="text" id="nama_pelanggan_display" readonly class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 outline-none" placeholder="Nama pelanggan akan muncul otomatis">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keluhan Kendaraan <span class="text-red-500">*</span></label>
            <textarea name="keluhan" rows="3" placeholder="Contoh: mesin mati, suara aneh, ganti oli" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>{{ old('keluhan') }}</textarea>
            @error('keluhan') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Servis <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_servis" value="{{ old('tanggal_servis') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
            @error('tanggal_servis') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="pt-2 flex items-center gap-3">
            <a href="{{ route('daftar-service.index') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium transition shadow-sm ml-auto">Simpan</button>
        </div>
    </form>
</div>
<script>
const pelangganMap = {{ json_encode($pelanggan->pluck('nama_lengkap', 'id_pelanggan')->all()) }};
const sel = document.getElementById('id_pelanggan');
const disp = document.getElementById('nama_pelanggan_display');
function updateNama(){ disp.value = pelangganMap[sel.value] || ''; }
sel.addEventListener('change', updateNama);
updateNama();
</script>
@endsection
