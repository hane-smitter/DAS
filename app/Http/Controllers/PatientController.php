<?php

namespace App\Http\Controllers;

use App\Models\DayOff;
use App\Models\SpecializationDepartment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patients;
use App\Models\Doctors;
use DateTime;
use Illuminate\Support\Facades\DB;
use Response;

class PatientController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showRegistrationForm()
    {
        return view('patient.register');
    }

    public function showDoctorSearchList(Request $request)
    {
        //->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($search))
        /* $doctors = Doctors::where('doctorName','LIKE',"%{$request->search}%")->
                            orWhere('chamberAddress','LIKE',"%{$request->search}%")->
                            orWhere('specializationDepartment','LIKE',"%{$request->search}%")->
                            where('isActiveForScheduling',true)->get(); */

        $doctors = Doctors::whereRaw('MATCH (doctorName,chamberAddress,specializationDepartment,specializationDepartmentKeywords)  AGAINST (? IN BOOLEAN MODE)', [$request->search])
                    ->where('isActiveForScheduling',true)->get();

        /* $doctors = DB::table('doctors')
            ->selectRaw('*, MATCH (doctorName,chamberAddress,specializationDepartment)  AGAINST (? IN BOOLEAN MODE)
                AS score', [$request->search])
            ->where('isActiveForScheduling', true)
            ->orderBy('score', 'desc')
            ->get(); */

        //        $doctors = Doctors::where('doctorName','LIKE',"%{$request->search}%")
        //            orWhere('specializationDepartment','LIKE',"%{$request->search}%")->get();

        if (count($doctors) != 0) {
            return view('patient.doctorSearchList', ['doctors' => $doctors]);
        } else flash('Search result is empty');
        //
        return redirect()->route("patient.takeAppointment");
    }
    ///
    public function getDoctorProfile($id)
    {

        $user = User::where('id', $id)->first();
        $doctor = Doctors::where('user_id', $user->id)->first();
        $department = SpecializationDepartment::where('id', $doctor->specializationDepartmentId)->first();
        $birthday = new DateTime($user->date_of_birth);
        $currentDate = new DateTime(date("Y-m-d"));
        $interval = $birthday->diff($currentDate);

        $age = $interval->format('%Y');

        return view('patient.profile_doctor', ['doctor' => $doctor, 'user' => $user, 'department' => $department, 'age' => $age]);
        //        return $doctor->specializationDepartmentId;
        //        return $department;
    }



    //    public function appointmentCalculate($id){
    ////          {{ $id->id; }}
    //        $doctor = Doctors::find($id);
    //        dd($doctor);
    //        return redirect()->route('patient.doctorSearchList');
    //    }

    public function loadDoctorProfile(Request $request)
    {
        $doctor = Doctors::where('id', $request->doctor)->first();
        $user = User::where('id', $doctor->user_id)->first();
        $department = SpecializationDepartment::where('id', $doctor->specializationDepartmentId)->first();
        $birthday = new DateTime($user->date_of_birth);
        $currentDate = new DateTime(date("Y-m-d"));
        $interval = $birthday->diff($currentDate);

        $age = $interval->format('%Y');

        return view('patient.profile_doctor', ['doctor' => $doctor, 'user' => $user, 'department' => $department, 'age' => $age]);
        //        return $doctor->specializationDepartmentId;
        //        return $department;
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
