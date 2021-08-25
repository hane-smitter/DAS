<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    public function roleIsDoctor()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'Doctor',
            ];
        });
    }

    public function roleIsPatient()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'Patient',
            ];
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $Setgender = $this->faker->randomElement($array = array ('male', 'female'));
        return [
            'name' => $this->faker->name($gender = $Setgender),
            'email' => $this->faker->unique()->safeEmail(),
            // 'mobileNo' => $this->faker->unique()->phoneNumber,
            'mobileNo' => '07' . $this->faker->unique()->randomNumber($nbDigits = 8, $strict = true),
            'gender' => $Setgender,
            'date_of_birth' => $this->faker->dateTimeBetween($startDate = '-55 years', $endDate = '-33 years', $timezone = 'Africa/Nairobi'),
            'pictureLink' => $this->faker->imageUrl($width = 200, $height = 200, 'people', true, 'Fake'),
            'isActivated' => true,
            'role' => 'Patient',
            'password' => Hash::make('smart1234'),
            'remember_token' => Str::random(10),
        ];
    }
}
