<?php

namespace App\Http\Controllers\Api;

use App\Models\Pembayaran;

class PembayaranController extends CrudApiController
{
    protected string $model = Pembayaran::class;
    protected array $with = ['daftarService.pelanggan'];

    protected function rules(?string $id = null): array
    {
        return [
            'id_servis'        => 'required|exists:daftar_service,id_servis',
            'jumlah_biaya'     => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
            'keterangan'       => 'nullable|string',
        ];
    }
}
