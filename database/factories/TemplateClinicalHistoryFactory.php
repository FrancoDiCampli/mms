<?php

namespace Database\Factories;

use App\Models\TemplateClinicalHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateClinicalHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TemplateClinicalHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'reason_consult' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'current_disease_history' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'overall_status' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'respiratory_system' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'cardiovascular_system' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'abdomen' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'diagnostic' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'study_plan' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'treatment' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
