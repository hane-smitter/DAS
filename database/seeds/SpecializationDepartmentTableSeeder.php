<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitalDepts = ['Accident and emergency (A&E)', 'Anesthetics', 'Admissions', 'Breast Screening', 'Burn Center (Burn Unit or Burns Unit)', 'Cardiology', 'Central Sterile Services Department (CSSD)', 'Chaplaincy', 'Coronary Care Unit (CCU)', 'Critical Care', 'Diagnostic Imaging', 'Discharge Lounge', 'Elderly Services', 'Gastroenterology', 'General Surgery', 'Gynecology', 'Haematology', 'Intensive Care Unit (ICU)', 'Maternity', 'Microbiology', 'Neonatal', 'Neurology', 'Nephrology', 'Nutrition and Dietetics', 'Occupational Therapy', 'Oncology', 'Ophthalmology', 'Orthopaedics', 'Otolaryngology (Ear, Nose, and Throat)', 'Pain Management', 'Pharmacy', 'Physiotherapy', 'Radiology', 'Radiotherapy', 'Renal', 'Rheumatology', 'Sexual Health', 'Urology'];
        $deptsCount = count($hospitalDepts);
        for ($i = 0; $i < $deptsCount; $i++) {
            DB::table('specialization_department')->insert([
                'departmentName' => $hospitalDepts[$i],
                'created_at' => now()
            ]);
        }
    }
}
