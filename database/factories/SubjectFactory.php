<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
            'description' => $this->faker->optional()->sentence(),
            'code' => $this->faker->regexify('IK-[A-Z]{3}[0-9]{3}'),
            'credits' => $this->faker->numberBetween(1, 10),
            'user_id' => 1
        ];
    }
}
