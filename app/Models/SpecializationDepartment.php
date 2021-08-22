<?php
/**
 * Created by PhpStorm.
 * User: LINKN
 * Date: 11/29/2017
 * Time: 8:25 PM
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Student;

class SpecializationDepartment extends Model
{
    use HasFactory;

    protected $table = 'specialization_department';
    protected $fillable = ['departmentName' ];

    public function doctors(){
        return $this->belongsTo(Doctors::class);
    }


}
