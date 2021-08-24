<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Doctors extends Model
{
    use HasFactory;

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
                'isAvailableOnFriday' => 1,
                'fridayStartingTime' => '02:05 PM',
                'fridayClosingTime' => '04:00 PM',
                'isAvailableOnSaturday' => 0,
                'isAvailableOnSunday' => 0,
                'isAvailableOnMonday' => 1,
                'mondayStartingTime' => '02:05 PM',
                'mondayClosingTime' => '04:00 PM',
                'isAvailableOnTuesday' => 0,
                'isAvailableOnWednesday' => 1,
                'wednesdayStartingTime' => '02:05 PM',
                'wednesdayClosingTime' => '04:00 PM',
                'isAvailableOnThursday' => 0,
                'timeForCategoryA_patients' => 20,
                'timeForCategoryB_patients' => 15,
                'timeForCategoryC_patients' => 10,
            ]);
        });
    }


}