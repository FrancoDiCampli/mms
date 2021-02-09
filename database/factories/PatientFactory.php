<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'dni' => $this->faker->randomNumber(8, true),
            'social_work_id' => 1,
            'ant_medical' => $this->faker->text($maxNbChars = 200),
            'ant_surgical' => $this->faker->text($maxNbChars = 200)
        ];
    }
}
