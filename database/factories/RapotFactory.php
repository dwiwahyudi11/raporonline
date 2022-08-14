<?php

namespace Database\Factories;

use App\Models\Rapot;
use Illuminate\Database\Eloquent\Factories\Factory;

class RapotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rapot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_nilai' => $this->faker->randomDigitNotNull,
        'sakit' => $this->faker->randomDigitNotNull,
        'izin' => $this->faker->randomDigitNotNull,
        'tanpa_keterangan' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
