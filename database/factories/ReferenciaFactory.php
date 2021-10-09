<?php

namespace Database\Factories;

use App\Models\Referencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Referencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'description' => $this->faker->text(),
        ];
    }
}
