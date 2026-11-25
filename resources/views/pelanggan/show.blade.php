@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('pelanggan.index') }}" class="text-gray-500 hover:text-gray-700">← Kembali</a>
        <h2 class="text-xl font-semibold text-gray-900">Detail Pelanggan</h2>
    </div>

    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Id Pelanggan</p>
                <p class="text-sm text-gray-900">{{ $pelanggan->id_pelanggan }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Nama Lengkap</p>
                <p class="text-sm text-gray-900 font-medium">{{ $pelanggan->nama_lengkap }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">No HP</p>
                <p class="text-sm text-gray-900">{{ $pelanggan->no_hp }}</p>
            </div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Pekerjaan</p>
                <p class="text-sm text-gray-700">{{ $pelanggan->pekerjaan }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-xs font-medium text-gray-500 uppercase mb-1">Alamat</p>
                <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $pelanggan->alamat }}</p>
            </div>
        </div>

        @if($pelanggan->daftarServices->count())
            <div class="mt-6 pt-6 border-t border-gray-200">
                <h3 class="text-sm font-semibold text-gray-900 mb-3 uppercase tracking-wide">Daftar Service</h3>
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">
                            <th class="pb-2">Id Servis</th>
                            <th class="pb-2">Keluhan</th>
                            <th class="pb-2">Tanggal Servis</th>
                            <th class="pb-2 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($pelanggan->daftarServices as $ds)
                        <tr>
                            <td class="px-4 py-3 text-gray-900">#{{ $ds->id_servis }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $ds->keluhan }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ \Carbon\Carbon::parse($ds->tanggal_servis)->format('d M Y') }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('daftar-service.show', $ds->id_servis) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-6 pt-2 flex items-center gap-3">
            <a href="{{ route('pelanggan.edit', $pelanggan->id_pelanggan) }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Ubah Data</a>
            <a href="{{ route('pelanggan.index') }}" class="text-gray-500 hover:text-gray-700 text-sm ml-auto">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection