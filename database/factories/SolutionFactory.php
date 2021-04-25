<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Solution;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Solution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $task=Task::inRandomOrder()->first();
        $user=$task->subject->students->random();

        return [
            'student_name'=> $user->name,
            'student_email'=> $user->email,
            'solution'=> $this->faker->optional()->sentence(),
            'points'=> $this->faker->optional()->numberBetween(0,$task->points),
            'task_id'=>$task->id,
            'is_evaluated'=> false,
        ];
    }
}
