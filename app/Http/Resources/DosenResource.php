<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DosenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nidn2010041' => $this->nidn2010041,
            'namalengkap2010041' => $this->namalengkap2010041,
            'jenkel2010041' => $this->jenkel2010041,
            'tmp_lahir2010041' => $this->tmp_lahir2010041,
            'tgl_lahir2010041' => $this->tgl_lahir2010041,
            'alamat2010041' => $this->alamat2010041,
            'notelp2010041' => $this->notelp2010041
        ];

    }
}
