<?php

namespace App\Http\Controllers\Api;

use App\Models\DaftarService;
use Illuminate\Validation\Rule;

class DaftarServiceController extends CrudApiController
{
    protected string $model = DaftarService::class;
    protected array $with = ['kendaraan', 'pelanggan'];

    protected function rules(?string $id = null): array
    {
        return [
            'id_servis'      => ['required', 'string', 'max:10', Rule::unique('daftar_service', 'id_servis')->ignore($id, 'id_servis')],
            'no_plat'        => 'required|exists:kendaraan,no_plat',
            'id_pelanggan'   => 'required|exists:pelanggan,id_pelanggan',
            'keluhan'        => 'required|string',
            'tanggal_servis' => 'required|date',
        ];
    }
}
