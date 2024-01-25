<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatakuliahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'kdmatkul2010041' => $this->kdmatkul2010041,
            'namamat2010041' => $this->namamat2010041,
            'sks2010041' => $this->sks2010041

        ];
    }
}
