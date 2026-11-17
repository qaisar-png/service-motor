<?php

namespace App\Http\Controllers\Api;

use App\Models\DaftarService;

class DaftarServiceController extends CrudApiController
{
    protected string $model = DaftarService::class;
    protected array $with = ['kendaraan', 'pelanggan'];

    protected function rules(?string $id = null): array
    {
        return [
            'no_plat'        => 'required|exists:kendaraan,no_plat',
            'id_pelanggan'   => 'required|exists:pelanggan,id_pelanggan',
            'keluhan'        => 'required|string',
            'tanggal_servis' => 'required|date',
        ];
    }
}
