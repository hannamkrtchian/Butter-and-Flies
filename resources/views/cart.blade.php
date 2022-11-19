@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br><h2>Cart</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Items in your cart: </p>

                    @foreach($items_in_cart as $item)
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3">
                                <img src="{{ $item->picture }}" alt="{{ $item->description }}">
                            </div>
                            <div class="col-md-3 ">
                                <h1>{{ $item->title }}</h1>
                                <p>{{ $item->description }}</p>
                                <p>Category: {{ $item->category }}</p><br>
                                <p>€ {{ $item->price }}</p> <br>
                            </div>
                                <div class="col-md-3 text-center">
                                    <br><br>
                                    <!-- verwijderen uit cart -->
                                    <a href="#" class="btn btn-primary">Delete from cart</a>
                                </div>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection