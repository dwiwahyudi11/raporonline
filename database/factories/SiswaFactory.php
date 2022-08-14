<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => $this->faker->randomDigitNotNull,
        'id_kelas' => $this->faker->randomDigitNotNull,
        'kontak' => $this->faker->word,
        'tempat_lahir' => $this->faker->word,
        'tanggal_lahir' => $this->faker->word,
        'tahun_masuk' => $this->faker->word,
        'tahun_lulus' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
