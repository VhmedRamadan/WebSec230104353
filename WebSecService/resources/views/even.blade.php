@extends('layouts.master') <!-- Extend the master layout -->

@section('title', 'Even Numbers') <!-- Define the title section -->

@section('content') <!-- Define the content section -->
    <div class="card m-4">
        <div class="card-body">
            <h3>Even Numbers from 1 to 100</h3>
            <div class="badge-container">
                @foreach (range(1, 100) as $i)
                    @if(isEven($i))
                        <span class="badge bg-primary">{{$i}}</span>
                    @else
                        <span class="badge bg-secondary">{{$i}}</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection