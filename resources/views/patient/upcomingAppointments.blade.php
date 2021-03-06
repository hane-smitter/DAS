@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('patient.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h1 align="center"> <strong> Your Upcoming Appointments </strong> </h1>
                        {{--@include('flash::message')--}}
                    </div>
                </div>

                <div class="panel panel-default" >
                    <div class="panel-body" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Doctor Name</th>
                                <th>Appointment time</th>
                                <th>Chamber Status</th>
                                <th>Action </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $appointments as $item )

                                <tr>
                                    <td >{{$item->serial}}</td>
                                    <td>{{$item->doctor->user->name}}</td>
                                    <td>{{Carbon\Carbon::parse($item->scheduledTime)->format('g:i a d-m-Y ')}} </td>
                                    <td>
                                        <a href='{{url('/patient/liveChamber/'.$item->doctor->user->id)}}' class="btn btn-primary"> G0! </a>
                                    </td>
                                    <td>
{{--                                        <a href="{{url('/patient/doctorProfile/'.$item->id)}}" class="btn btn-primary">Profile</a>--}}
                                        <a href='{{url('/patient/cancelAppointment/'.$item->id)}}' class="btn btn-primary"> Cancel </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('css')
    <style rel="stylesheet">
        .table > tbody > tr > td {
            max-width: 100px;
            overflow-wrap: break-word;
        }
    </style>
@endsection