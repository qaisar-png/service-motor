@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('pembayaran.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
        <h2 class="text-xl font-semibold text-gray-900">Detail Pembayaran</h2>
    </div>

    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Id Pembayaran</p>
                <p class="text-sm text-gray-900 font-medium">#{{ $pembayaran->id }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Id Servis Pelanggan</p>
                <p class="text-sm text-gray-900 font-medium">#{{ optional($pembayaran->daftarService)->id_servis ?? '-' }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Keluhan Kendaraan</p>
                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ optional($pembayaran->daftarService)->keluhan ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">No Plat Kendaraan</p>
                <p class="text-sm text-gray-900 uppercase">{{ optional(optional($pembayaran->daftarService)->kendaraan)->no_plat ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Nama Pelanggan</p>
                <p class="text-sm text-gray-700">{{ optional(optional($pembayaran->daftarService)->pelanggan)->nama_lengkap ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Jumlah Biaya</p>
                <p class="text-sm text-gray-900 font-medium">Rp {{ number_format($pembayaran->jumlah_biaya, 0, ',', '.') }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Jenis Pembayaran</p>
                <p class="text-sm text-gray-900">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $pembayaran->jenis_pembayaran === 'Cash / Tunai' ? 'bg-green-100 text-green-800' : 'bg-indigo-100 text-indigo-800' }}">
                        {{ $pembayaran->jenis_pembayaran }}
                    </span>
                </p>
            </div>
            <div class="col-span-2">
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Keterangan</p>
                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $pembayaran->keterangan ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-6 pt-2 flex items-center gap-3">
            <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Ubah Data</a>
            <a href="{{ route('pembayaran.index') }}" class="text-gray-500 hover:text-gray-700 text-sm ml-auto">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection