<?php

namespace App\Http\Controllers\Api;

use App\Models\DataService;

class DataServiceController extends CrudApiController
{
    protected string $model = DataService::class;
    protected array $with = ['daftarService.pelanggan'];

    protected function rules(?string $id = null): array
    {
        return [
            'id_servis'           => 'required|exists:daftar_service,id_servis',
            'estimasi_service'    => 'required|string|max:100',
            'nama_mekanik'        => 'required|string|max:100',
            'sparepart_pengganti' => 'nullable|string|max:255',
        ];
    }
}
