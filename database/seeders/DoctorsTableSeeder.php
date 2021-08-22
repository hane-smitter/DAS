<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctors;
use App\Models\SpecializationDepartment;//scheduling_setting
use App\Models\SchedulingSetting;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(10)
            ->roleIsDoctor()
            ->has(
                Doctors::factory()
                        ->count(1)
                        ->state(function (array $attributes, User $user) {
                            $dept = SpecializationDepartment::inRandomOrder()->first();
                            return [
                                'doctorName' => $user->name,
                                'SpecializationDepartmentId' => $dept->id,
                                'SpecializationDepartment' => $dept->departmentName,
                            ];
                        })
                        ->has(
                            SchedulingSetting::factory()->count(1)
                        ,'scheduling_setting')
            )
            ->create();
    }
}
