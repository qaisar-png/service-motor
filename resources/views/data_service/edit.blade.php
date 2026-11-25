@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <h2 class="text-xl font-semibold text-gray-900 mb-6">Ubah Data Service</h2>
    <form action="{{ route('data-service.edit', $dataService->id) }}" method="POST" class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Id Servis Pelanggan <span class="text-red-500">*</span></label>
            <select name="id_servis" id="id_servis" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                <option value="">-- Pilih Id Servis Pelanggan --</option>
                @foreach($servis as $s)
                    <option value="{{ $s->id_servis }}" {{ old('id_servis', $dataService->id_servis) == $s->id_servis ? 'selected' : '' }}>{{ $s->id_servis }} - {{ $s->keluhan }}</option>
                @endforeach
            </select>
            @error('id_servis') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Keluhan Kendaraan <span class="text-gray-400 text-xs">(muncul otomatis setelah pilih Id Servis)</span></label>
            <input type="text" id="keluhan_display" readonly class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 outline-none" placeholder="Keluhan akan muncul otomatis">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Estimasi Service <span class="text-red-500">*</span></label>
            <input type="text" name="estimasi_service" value="{{ old('estimasi_service', $dataService->estimasi_service) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
            @error('estimasi_service') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Mekanik <span class="text-red-500">*</span></label>
            <input type="text" name="nama_mekanik" value="{{ old('nama_mekanik', $dataService->nama_mekanik) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
            @error('nama_mekanik') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Sparepart Pengganti</label>
            <input type="text" name="sparepart_pengganti" value="{{ old('sparepart_pengganti', $dataService->sparepart_pengganti) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            @error('sparepart_pengganti') <p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="pt-2 flex items-center gap-3">
            <a href="{{ route('data-service.index') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium transition shadow-sm ml-auto">Perbarui</button>
        </div>
    </form>
</div>
<script>
const servisMap = {{ json_encode($servis->pluck('keluhan', 'id_servis')->all()) }};
const sel = document.getElementById('id_servis');
const disp = document.getElementById('keluhan_display');
function updateKeluhan(){ disp.value = servisMap[sel.value] || ''; }
sel.addEventListener('change', updateKeluhan);
updateKeluhan();
</script>
@endsection
