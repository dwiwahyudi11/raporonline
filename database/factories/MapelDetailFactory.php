<?php

namespace Database\Factories;

use App\Models\MapelDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class MapelDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MapelDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_mapel' => $this->faker->randomDigitNotNull,
        'id_kelas' => $this->faker->randomDigitNotNull,
        'id_guru' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
