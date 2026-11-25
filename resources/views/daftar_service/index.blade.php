@extends('layouts.app')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h2 class="text-xl font-semibold text-gray-900">Daftar Service</h2>
        <p class="text-sm text-gray-500">Pendaftaran kendaraan pelanggan untuk service.</p>
    </div>
    <a href="{{ route('daftar-service.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium transition shadow-sm">
        Daftarkan Service
    </a>
</div>

@if($data->count())
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200 w-16">Id Servis</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">No Plat Kendaraan</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200 w-16">Id Pelanggan</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">Nama Pelanggan</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">Keluhan</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase border-b border-gray-200">Tanggal Servis</th>
                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase border-b border-gray-200 w-32">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($data as $row)
            <tr>
                <td class="px-4 py-3 text-sm text-gray-900">#{{ $row->id_servis }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ optional($row->kendaraan)->no_plat }}</td>
                <td class="px-4 py-3 text-sm text-gray-900">{{ $row->id_pelanggan }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ optional($row->pelanggan)->nama_lengkap }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ $row->keluhan }}</td>
                <td class="px-4 py-3 text-sm text-gray-700">{{ \Carbon\Carbon::parse($row->tanggal_servis)->format('d M Y') }}</td>
                <td class="px-4 py-3 text-sm text-right">
                    <a href="{{ route('daftar-service.show', $row->id_servis) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Detail</a>
                    <a href="{{ route('daftar-service.edit', $row->id_servis) }}" class="text-indigo-600 hover:text-indigo-800 font-medium ml-2">Ubah</a>
                    <form action="{{ route('daftar-service.destroy', $row->id_servis) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus daftar service ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium ml-3">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
    <div class="bg-white p-8 rounded-lg border border-gray-200 text-center">
        <p class="text-gray-500">Belum ada daftar service.</p>
    </div>
@endif
@endsection
