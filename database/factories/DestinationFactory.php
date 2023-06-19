<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Определение модели, которую фабрика будет использовать.
     *
     * @var string
     */
    protected $model = Destination::class;

    /**
     * Определение значений атрибутов модели для фабрики.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'long' => $this->faker->longitude,
            'lat' => $this->faker->latitude,
        ];
    }
}
