<?php

namespace Database\Factories;

use App\Models\SocialWork;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialWorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialWork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company
        ];
    }
}
