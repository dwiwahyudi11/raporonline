<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guru::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => $this->faker->randomDigitNotNull,
        'id_kelas_wali' => $this->faker->randomDigitNotNull,
        'nuptk' => $this->faker->randomDigitNotNull,
        'nip' => $this->faker->randomDigitNotNull,
        'tempat_lahir' => $this->faker->word,
        'tanggal_lahir' => $this->faker->word,
        'alamat' => $this->faker->word,
        'jenis_kelamin' => $this->faker->word,
        'agama' => $this->faker->word,
        'kontak' => $this->faker->word,
        'status_kepegawaian' => $this->faker->word,
        'jenis_ptk' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
