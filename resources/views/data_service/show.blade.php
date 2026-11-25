@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('data-service.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
        <h2 class="text-xl font-semibold text-gray-900">Detail Data Service</h2>
    </div>

    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Id Data Service</p>
                <p class="text-sm text-gray-900 font-medium">#{{ $dataService->id }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Id Servis Pelanggan</p>
                <p class="text-sm text-gray-900 font-medium">#{{ optional($dataService->daftarService)->id_servis ?? '-' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Keluhan Kendaraan</p>
                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ optional($dataService->daftarService)->keluhan ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">No Plat Kendaraan</p>
                <p class="text-sm text-gray-900 uppercase">{{ optional(optional($dataService->daftarService)->kendaraan)->no_plat ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Nama Pelanggan</p>
                <p class="text-sm text-gray-700">{{ optional(optional($dataService->daftarService)->pelanggan)->nama_lengkap ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Estimasi Service</p>
                <p class="text-sm text-gray-900">{{ $dataService->estimasi_service }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Nama Mekanik</p>
                <p class="text-sm text-gray-900 font-medium">{{ $dataService->nama_mekanik }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Sparepart Pengganti</p>
                <p class="text-sm text-gray-700">{{ $dataService->sparepart_pengganti ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-6 pt-2 flex items-center gap-3">
            <a href="{{ route('data-service.edit', $dataService->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Ubah Data</a>
            <a href="{{ route('data-service.index') }}" class="text-gray-500 hover:text-gray-700 text-sm ml-auto">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection