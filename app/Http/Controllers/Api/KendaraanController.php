<?php

namespace App\Http\Controllers\Api;

use App\Models\Kendaraan;
use Illuminate\Validation\Rule;

class KendaraanController extends CrudApiController
{
    protected string $model = Kendaraan::class;

    protected function rules(?string $id = null): array
    {
        return [
            'no_plat' => [
                'required', 'string', 'max:15',
                Rule::unique('kendaraan', 'no_plat')->ignore($id, 'no_plat'),
            ],
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk'         => 'required|string|max:30',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik'    => 'required|string|max:255',
            'warna'           => 'required|string|max:30',
        ];
    }
}
