@extends('layouts.master')
@section('title','minitest')
@section('content')
<div class="container">
        <h1>course </h1>
        <div class="row">
                <div class="col-md-4 col-sm-6 table-container">
                    <table class="table table-bordered">
                        <h1>table of ahmed</h1>
                        <thead>
                            <tr>
                                <th>code</th>
                                <th>course name</th>
                                <th>grade</th>
                                <th>credit hours</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course as $course)
                            <tr>
                                <td>{{$course["code"]}}</td>
                                <td>{{$course["name"]}}</td>
                                <td>{{$course["grade"]}}</td>
                                <td>{{$course["chour"]}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    subtotal:{{$sub}}
                </div>

        </div>
    </div>
@endsection