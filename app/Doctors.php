<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Doctors extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'doctorName',
        'registrationNo',
        'educationalDegrees',
        'specializationDepartment',
        'specializationDepartmentId',
        'chamberAddress',
        'chamberAddressGeoLocation',
        'visitFee',
        'isActiveForScheduling',
        'isCurrentlyOpen',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scheduling_setting()
    {
        return $this->hasOne(SchedulingSetting::class, 'doctor_id');
    }
    public function dayOff(){
        return $this->hasOne(DayOff::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function($doctor) {
            $doctor->scheduling_setting()->create([
                'isAvailableOnFriday' => 0,
                'isAvailableOnSaturday' => 0,
                'isAvailableOnSunday' => 0,
                'isAvailableOnMonday' => 0,
                'isAvailableOnTuesday' => 0,
                'isAvailableOnWednesday' => 0,
                'isAvailableOnThursday' => 0,
                'timeForCategoryA_patients' => 20,
                'timeForCategoryB_patients' => 15,
                'timeForCategoryC_patients' => 10,
            ]);
        });
    }


}