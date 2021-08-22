<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Assistants extends Model
{
    use HasFactory;

    protected $table = 'assistants';


    protected $fillable = [
        'user_id', 'address', 'doctor_id', 'education', 'isActive'
        ,
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }


    public function appointments()
    {
        return $this->hasMany(Appointments::class);
    }


}

