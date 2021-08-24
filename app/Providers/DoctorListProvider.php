<?php

namespace App\Providers;

use App\Models\Doctors;
use Illuminate\Support\ServiceProvider;

class  DoctorListProvider extends ServiceProvider
{
    public function boot()
    {
        view()-> composer('*',function ($view)
        {
            $view -> with ('doctorList', Doctors::all());

        });
    }
}