<?php

namespace Database\Factories;

use App\Models\Doctors;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctors::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'registrationNo' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'educationalDegrees' => $this->faker->randomElement($array = array ('M.D', 'Degree', 'D.O')),
            'chamberAddress' => $this->faker->streetAddress,
            'chamberAddressGeoLocation' => $this->faker->latitude($min = -90, $max = 90) . ', ' . $this->faker->longitude($min = -180, $max = 180),
            'visitFee' => $this->faker->randomNumber($nbDigits = 3, $strict = false),
            'isActiveForScheduling' => true,
            'isChamberCurrentlyOpen' => true,
        ];
    }
}
