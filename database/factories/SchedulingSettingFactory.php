<?php

namespace Database\Factories;

use App\Models\SchedulingSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchedulingSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchedulingSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isAvailableOnFriday' => 1, 
            'isAvailableOnSaturday' => 0,
            'isAvailableOnSunday' => 0, 
            'isAvailableOnMonday' => 1,
            'isAvailableOnTuesday' => 0,
            'isAvailableOnWednesday' => 1,
            'isAvailableOnThursday' => 0,
            'timeForCategoryA_patients' => 10,
            'timeForCategoryB_patients' => 15,
            'timeForCategoryC_patients' => 20,
        ];
    }
}
