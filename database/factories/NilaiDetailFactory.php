<?php

namespace Database\Factories;

use App\Models\NilaiDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NilaiDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_nilai' => $this->faker->randomDigitNotNull,
        'id_mapel' => $this->faker->randomDigitNotNull,
        'tugas_satu' => $this->faker->randomDigitNotNull,
        'tugas_dua' => $this->faker->randomDigitNotNull,
        'tugas_tiga' => $this->faker->randomDigitNotNull,
        'tugas_empat' => $this->faker->randomDigitNotNull,
        'tugas_lima' => $this->faker->randomDigitNotNull,
        'uts' => $this->faker->randomDigitNotNull,
        'uas' => $this->faker->randomDigitNotNull,
        'deskripsi' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
