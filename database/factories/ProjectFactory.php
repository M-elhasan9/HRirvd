<?php

namespace Database\Factories;

use App\Models\project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_name'=>$this->faker->name,
            'project_code'=>$this->faker->countryCode,
            'start_date'=>$this->faker->date,
            'end_date'=>$this->faker->date,
            'country'=>$this->faker->city,
        ];
    }
}
