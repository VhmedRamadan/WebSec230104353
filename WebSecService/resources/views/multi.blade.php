@extends('layouts.master')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row">
            @for ($i = 1; $i <= $upto; $i++) <!-- Use $upto variable -->
                <div class="col-md-4 col-sm-6 table-container">
                    <h3>Table of {{ $i }}</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Multiplier</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($j = 1; $j <= 10; $j++)
                                <tr>
                                    <td>{{ $i }} x {{ $j }}</td>
                                    <td>{{ $i * $j }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            @endfor
        </div>
    </div>
@endsection