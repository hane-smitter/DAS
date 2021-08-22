<?php

namespace App\Models;
//use Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Mail\EmailVerification;

class User_activation extends Model
{
    use HasFactory;

    protected $table='user_activation';

    protected $fillable=['user_id','token','created_at'];

    public $timestamps = false;

}
