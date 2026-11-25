@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('daftar-service.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
        <h2 class="text-xl font-semibold text-gray-900">Detail Daftar Service</h2>
    </div>

    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Id Servis</p>
                <p class="text-sm text-gray-900 font-medium">{{ $daftarService->id_servis }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">No Plat Kendaraan</p>
                <p class="text-sm text-gray-900 uppercase">{{ optional($daftarService->kendaraan)->no_plat ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Id Pelanggan</p>
                <p class="text-sm text-gray-900">{{ $daftarService->id_pelanggan }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Nama Pelanggan</p>
                <p class="text-sm text-gray-700">{{ optional($daftarService->pelanggan)->nama_lengkap ?? '-' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Keluhan Kendaraan</p>
                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $daftarService->keluhan }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Tanggal Servis</p>
                <p class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($daftarService->tanggal_servis)->format('d M Y') }}</p>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="flex items-center justify-between mb-3">
                <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wide">Data Service</h3>
                <a href="{{ route('data-service.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-xs font-medium transition">Tambah Data Service</a>
            </div>
            @if($daftarService->dataService)
                <div class="bg-gray-50 p-4 rounded border border-gray-200">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1">Estimasi Service</p>
                    <p class="text-sm text-gray-700">{{ $daftarService->dataService->estimasi_service }}</p>
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1 mt-2">Nama Mekanik</p>
                    <p class="text-sm text-gray-700">{{ $daftarService->dataService->nama_mekanik }}</p>
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1 mt-2">Sparepart Pengganti</p>
                    <p class="text-sm text-gray-700">{{ $daftarService->dataService->sparepart_pengganti ?? '-' }}</p>
                </div>
            @else
                <p class="text-sm text-gray-500">Belum ada data service untuk servis ini.</p>
            @endif
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <h3 class="text-sm font-semibold text-gray-900 mb-3 uppercase tracking-wide">Pembayaran</h3>
            @if($daftarService->pembayaran)
                <div class="bg-green-50 p-4 rounded border border-green-200">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1">Jumlah Biaya</p>
                    <p class="text-sm text-gray-900 font-medium">Rp {{ number_format($daftarService->pembayaran->jumlah_biaya, 0, ',', '.') }}</p>
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1 mt-2">Jenis Pembayaran</p>
                    <p class="text-sm text-gray-700">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $daftarService->pembayaran->jenis_pembayaran === 'Cash / Tunai' ? 'bg-green-100 text-green-800' : 'bg-indigo-100 text-indigo-800' }}">
                            {{ $daftarService->pembayaran->jenis_pembayaran }}
                        </span>
                    </p>
                    @if($daftarService->pembayaran->keterangan)
                        <p class="text-xs font-medium text-gray-500 uppercase mb-1 mt-2">Keterangan</p>
                        <p class="text-sm text-gray-700">{{ $daftarService->pembayaran->keterangan }}</p>
                    @endif
                </div>
            @else
                <div class="flex items-center justify-between mb-3">
                    <p class="text-sm text-gray-500">Belum ada data pembayaran.</p>
                    <a href="{{ route('pembayaran.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-xs font-medium transition">Tambah Pembayaran</a>
                </div>
            @endif
        </div>

        <div class="mt-6 pt-2 flex items-center gap-3">
            <a href="{{ route('daftar-service.edit', $daftarService->id_servis) }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Ubah Data</a>
            <a href="{{ route('daftar-service.index') }}" class="text-gray-500 hover:text-gray-700 text-sm ml-auto">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection