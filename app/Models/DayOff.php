<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayOff extends Model
{
    use HasFactory;

    protected $table = 'day_offs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'doctor_id',
        'day_off_date',

    ];


    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }








}
