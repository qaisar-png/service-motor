<?php

namespace App\Http\Controllers\Api;

use App\Models\Pelanggan;

class PelangganController extends CrudApiController
{
    protected string $model = Pelanggan::class;

    protected function rules(?string $id = null): array
    {
        return [
            'nama_lengkap' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:20',
            'alamat'       => 'required|string',
            'pekerjaan'    => 'required|string|max:100',
        ];
    }
}
