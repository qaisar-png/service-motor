@extends('layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h2 class="text-xl font-semibold text-gray-900">Data Kendaraan</h2>
        <p class="text-sm text-gray-500">Kelola data kendaraan yang akan dilakukan service.</p>
    </div>
    <a href="{{ route('kendaraan.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition shadow-sm">
        Tambah Kendaraan
    </a>
</div>

@if($data->count())
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">No Plat Kendaraan</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">Jenis Kendaraan</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">No STNK</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">Tahun Pembuatan</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">Nama Pemilik</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">Warna</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase border-b border-gray-200 w-32">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($data as $row)
            <tr>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $row->no_plat }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        {{ $row->jenis_kendaraan }}
                    </span>
                </td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ $row->no_stnk }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ $row->tahun_pembuatan }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ $row->nama_pemilik }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ $row->warna }}</td>
                <td class="px-4 py-3 text-sm text-right">
                    <a href="{{ route('kendaraan.edit', $row->no_plat) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Ubah</a>
                    <form action="{{ route('kendaraan.destroy', $row->no_plat) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data kendaraan ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium ml-3">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="bg-white p-8 rounded-lg border border-gray-200 text-center">
        <p class="text-gray-500">Belum ada data kendaraan.</p>
    </div>
@endif
@endsection
