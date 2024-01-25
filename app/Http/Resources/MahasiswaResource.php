<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nim_2010041' => $this->nim_2010041,
            'nama_lengkap_2010041' => $this->nama_lengkap_2010041,
            'jenis_kelamin_2010041' => $this->jenis_kelamin_2010041,
            'tmp_lahir_2010041' => $this->tmp_lahir_2010041,
            'tgl_lahir_2010041' => $this->tgl_lahir_2010041,
            'alamat_2010041' => $this->alamat_2010041,
            'notelp_2010041' => $this->notelp_2010041,
            'foto' => $this->foto


        ];
    }
}
