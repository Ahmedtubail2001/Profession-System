<?php

namespace Database\Factories;

use App\Models\specialties;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\specialties>
 */
class SpecialtiesFactory extends Factory
{
    protected $model = specialties::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title_en' => $this->faker->jobTitle(),
            'title_ar' => $this->faker->word()
        ];
    }
}
