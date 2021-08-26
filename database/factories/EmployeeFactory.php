<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'birth_day'=>$this->faker->date,
            'gender'=>$this->faker->randomElement(['male','female']),
            'country'=>$this->faker->city,
            'city'=>$this->faker->city,
            'email'=>$this->faker->email,
            'phone'=>$this->faker->phoneNumber,
            'department'=>$this->faker->domainName,
            'position'=>$this->faker->domainName,
            'supervisior'=>$this->faker->name,
            'hr'=>$this->faker->name,
            'contract_type'=>$this->faker->randomElement(['full time','part time']),
            'is_active'=>$this->faker->boolean,
            'salary'=>$this->faker->numberBetween([100,5000]),
            'start_date'=>$this->faker->date,
            'end_date'=>$this->faker->date,
            'project_name'=>$this->faker->name,
            'not'=>$this->faker->paragraph,

        ];
    }
}
