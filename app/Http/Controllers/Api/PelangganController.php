<?php

namespace App\Http\Controllers\Api;

use App\Models\Pelanggan;
use Illuminate\Validation\Rule;

class PelangganController extends CrudApiController
{
    protected string $model = Pelanggan::class;

    protected function rules(?string $id = null): array
    {
        return [
            'id_pelanggan' => ['required', 'string', 'max:10', Rule::unique('pelanggan', 'id_pelanggan')->ignore($id, 'id_pelanggan')],
            'nama_lengkap' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:20',
            'alamat'       => 'required|string',
            'pekerjaan'    => 'required|string|max:100',
        ];
    }
}
