@extends('layouts.master')
@section('title','minitest')
@section('content')
<div class="container">
        <h1>bill </h1>
        <div class="row">
                <div class="col-md-4 col-sm-6 table-container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill as $item)
                            <tr>
                                <td>{{$item["item"]}}</td>
                                <td>{{$item["quantity"]}}</td>
                                <td>{{$item["price"]}}</td>
                                <td>{{$item["price"]*$item["quantity"]}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    subtotal:{{$sub}}
                </div>

        </div>
    </div>
@endsection