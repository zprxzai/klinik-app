<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /**zaidan */
    public function definition(): array
{
    return [
        'no_pasien' => $this->faker->unique()->randomNumber(5),
        'nama' => $this->faker->name(),
        'umur' => $this->faker->numberBetween(20, 50),
        'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
        'alamat' => $this->faker->address(),
    ];
}
}
