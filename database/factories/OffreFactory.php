<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_recruteur' => $this->faker->biasedNumberBetween(1,20),
            'id_entreprise' => $this->faker->biasedNumberBetween(1,20),
            'type' => $this->faker->word(),
            'ville' => $this->faker->city(),
            'diplome_requis' => $this->faker->word(),
            'remuneration' => $this->faker->numberBetween(100,45000),
        ];
    }
}
