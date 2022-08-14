<?php

namespace Database\Factories;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nilai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_siswa' => $this->faker->randomDigitNotNull,
        'id_kelas' => $this->faker->randomDigitNotNull,
        'semester' => $this->faker->word,
        'sakit' => $this->faker->randomDigitNotNull,
        'izin' => $this->faker->randomDigitNotNull,
        'tanpa_keterangan' => $this->faker->randomDigitNotNull,
        'catatan_wali_kelas' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
