<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdvsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location' => $this->faker->address ,
            'working_hour' => $this->faker->numberBetween(1 , 38),
            'e-date' => $this->faker->dateTime ,
            's-date' => $this->faker->dateTime,
            'category_id' => $this->faker->numberBetween(1 , 5),
            'cost' => $this->faker-> creditCardNumber,
            'picture' => null,
            'explaining' => $this->faker->realText,
            'advservice_id'=> $this->faker->numberBetween(1,5)
        ];
    }
}
