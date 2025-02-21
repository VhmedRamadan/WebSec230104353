@extends('layouts.master') <!-- Extend the master layout -->

@section('title', 'Home') <!-- Define the title section -->

@section('content') <!-- Define the content section -->
    <div class="card m-4">
        <div class="card-body">
            Welcome to the Home Page <br>
            used layout master to make a parent to get sections from it to the child pages
            in the muliplication table page i pass the data through the url and if no data was passed in url
            i put a default value in the web.php (8)
        </div>
    </div>
@endsection