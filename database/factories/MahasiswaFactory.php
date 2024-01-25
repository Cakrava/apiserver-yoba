<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mahasiswa::class;
    public function definition(): array
    {
        return [
            'nim_2010041' => $this->faker->unique()->numerify('#######'),
            'nama_lengkap_2010041' => $this->faker->name,
            'jenis_kelamin_2010041' => $this->faker->randomElement(['L', 'P']),
            'tmp_lahir_2010041' => $this->faker->city,
            'tgl_lahir_2010041' => $this->faker->date,
            'alamat_2010041' => $this->faker->address,
            'notelp_2010041' => $this->faker->phoneNumber

        ];
    }
}
