@extends('layouts.app')

@section('title', 'Shoes')

@section('content')
<div class="container">
    <h2>Check out our shoes.</h2>
    <br>
    <div class="d-flex flex-wrap">
        @foreach($items as $item)
            <div class="card" style="width: 18rem; margin: 0 20px 0 20px;">
                <img src="{{ $item->picture }}" class="card-img-top" alt="{{ $item->description }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">€ {{ $item->price }}</p>
                        <small class="card-text">Online since {{ $item->created_at->format('d/m/Y \a\t H:i') }}</small>
                        <br><br>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
            </div>
        @endforeach
    </div>
</div>
@endsection