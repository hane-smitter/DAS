<?php

namespace Database\Seeders;
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
        $hospitalDepts = [
        'Accident and emergency (A&E)' => 'also called Casualty Department, where you are likely to be taken if you have arrived in an ambulance or emergency situation',
        'Anesthetics' => 'doctors in this department give anesthetic for operations and procedures',
        'Admissions' => 'at the Admitting Department, the patient will be required to provide personal information and sign consent forms before being taken to the hospital unit or ward',
        'Breast Screening' => 'screens women for breast cancer and is usually linked to the X-ray or radiology department',
        'Burn Center (Burn Unit or Burns Unit)' => 'burn centers are often used for the treatment and recovery of patients with more severe burns',
        'Cardiology' => 'Provides medical care to patients who have problems with their heart or circulation',
        'Central Sterile Services Department (CSSD)' => 'performs sterilization and other actions on medical equipment, devices, and consumables',
        'Coronary Care Unit (CCU)' => 'specialized in the care of patients with heart attacks, unstable angina, cardiac dysrhythmia and other cardiac conditions that require continuous monitoring and treatment',
        'Critical Care' => 'also called intensive care, this department is for seriously ill patients',
        'Diagnostic Imaging' => 'also known as X-Ray Department and/or Radiology Department',
        'Gastroenterology' => 'investigates and treats digestive and upper and lower gastrointestinal diseases',
        'General Surgery' => 'wide range of types of surgery and procedures on patients.',
        'Gynecology' => 'investigates and treats problems relating to the female urinary tract and reproductive organs, such as Endometriosis, infertility and incontinence',
        'Haematology' => 'treat blood diseases and malignancies related to the blood, such as, myelofibrosis, hemophilia, blood clots, and blood cancers such as leukemia, lymphoma, and myeloma',
        'Intensive Care Unit (ICU)' => 'special department of a hospital or health care facility that provides intensive treatment medicine and caters to patients with severe and life-threatening illnesses and injuries, which require constant, close monitoring and support from specialist equipment and medications',
        'Maternity' => 'provide antenatal care, delivery of babies and care during childbirth, and postnatal support',
        'Neonatal' => 'provides care and support for babies and their families',
        'Neurology' => 'medical specialty dealing with disorders of the nervous system. Specifically, it deals with the diagnosis and treatment of all categories of disease involving the central, peripheral, and autonomic nervous systems, including their coverings, blood vessels, and all effector tissue, such as muscle. Includes the brain, spinal cord, and spinal cord injuries (SCI)',
        'Nephrology' => 'monitors and assesses patients with various kidney (renal) problems and conditions',
        'Nutrition and Dietetics' => 'provide specialist advice on diet for hospital wards and outpatient clinics',
        'Occupational Therapy' => 'helps physically or mentally impaired people, including temporary disability, practices in the fields of both healthcare as well as social care',
        'Oncology' => 'deals with cancer and tumors. provides treatments, including radiotherapy and chemotherapy, for cancerous tumors and blood disorders',
        'Ophthalmology' => 'deals with the diseases and surgery of the visual pathways, including the eye, hairs, and areas surrounding the eye, such as the lacrimal system and eyelids',
        'Orthopaedics' => 'treats conditions related to the musculoskeletal system, including joints, ligaments, bones, muscles, tendons and nerves',
        'Otolaryngology (Ear, Nose, and Throat)' => 'provide comprehensive and specialized care covering both Medical and Surgical conditions related not just specifically to the Ear, Nose and Throat, but also other areas within the Head and Neck region',
        'Pain Management' => 'helps treat patients with severe long-term pain. Alternative pain relief treatments such as acupuncture, nerve blocks and drug treatment, are also catered for',
        'Pharmacy' => 'drugs in a hospital, including purchasing, supply and distribution',
        'Physiotherapy' => 'work through physical therapies such as exercise, massage, and manipulation of bones, joints and muscle tissues',
        'Radiology' => 'highly specialized, full-service department which strives to meet all patient and clinician needs in diagnostic imaging and image-guided therapies',
        'Radiotherapy' => 'also called radiation therapy, is the treatment of cancer and other diseases with ionizing radiation',
        'Renal' => 'provides facilities for peritoneal dialysis and helps facilitate home Hemodialysis',
        'Sexual Health' => 'also known as genitourinary medicine - Provides advice, testing and treatment for sexually transmitted infections (sti), family planning care, pregnancy testing and advice, care and support for sexual and genital problems',
        'Urology' => 'run by consultant urology surgeons and investigates areas linked to kidney and bladder conditions'
    ];

        $depts = array_keys($hospitalDepts);

        foreach($depts as $department){
            DB::table('specialization_department')->insert([
                'departmentName' => $department,
                'departmentKeywords' => $hospitalDepts[$department],
                'created_at' => now()
            ]);
        };
        /* $deptsCount = count($hospitalDepts);
        for ($i = 0; $i < $deptsCount; $i++) {
            DB::table('specialization_department')->insert([
                'departmentName' => $hospitalDepts[$i],
                'departmentKeywords' => '',
                'created_at' => now()
            ]);
        } */
    }
}
