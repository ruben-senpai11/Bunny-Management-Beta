<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bunny>
 */
class BunnyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            'Uid' => Uuid::uuid4()->toString(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'destination' => $this->faker->randomElement(['fattening', 'mating']),
            'age' => $this->faker->randomElement(['baby_bunny', 'growing', 'weaning', 'young_adult_bunny', 'adult', 'old']),
            'state' => $this->faker->randomElement(['healthy', 'sick_bunny', 'dead', 'sold']),
            'weight' => $this->faker->randomFloat(2, 0.1, 10.0),
            'color' => $this->faker->colorName,
            'date_birth' => $this->faker->dateTimeBetween('-5 years', '-1 day'),
          
        ];
    }

    
}


