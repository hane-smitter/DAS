<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;

    protected $table = 'admins';


    protected $fillable = [
        'user_id', 'address',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
