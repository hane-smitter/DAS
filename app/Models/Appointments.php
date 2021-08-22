<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    protected $table = 'appointments';


    protected $fillable = [
        'doctor_id', 'patient_id' ,  'scheduledTime' , 'endTime' , 'appointmentDuration',
        'isCurrentlyActive','diseaseSymptom', 'medication' , 'tips' ,'isbooked','isCancelled','serial'

    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class);
    }
    public function assistants()
    {
        return $this->hasOne(Assistants::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }


}
