@extends('layouts.app')

@section('title', $item->title)

@section('content')
<div class="container">
    <br>
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
                <!-- persoon moet een user zijn en mag geen admin zijn (admin heeft geen cart)-->
                @if(Auth::user() && !Auth::user()->is_admin)
                    <a href="{{ route('addToCart', $item->id) }}" class="btn btn-primary">Add to cart</a>
                <!-- als de persoon niet ingelogd is -->
                @elseif(!Auth::user())
                    <a href="{{ route('login') }}" class="btn btn-primary">Login to add items to your cart</a>
                @endif
                <!-- admin kan post veranderen -->
                @if(Auth::user() && Auth::user()->is_admin)
                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary m-2">Edit item</a>
                    <form method="POST" action="{{ route('items.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete item" class="btn m-2 bg-danger text-white">
                    </form>
                @endif
            </div>
        
    </div>

    <br><hr>
    <h4>Other items, from the same category, that might interest you:</h4><br>
    <div class="d-flex flex-wrap">

        @foreach($otheritems as $otheritem)
        @if($loop->index < 4)
            <div class="card" style="width: 18rem; margin: 10px;">
                <img src="{{ $otheritem->picture }}" class="card-img-top" alt="{{ $otheritem->description }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $otheritem->title }}</h5>
                        <p class="card-text">€ {{ $otheritem->price }}</p>
                        <small class="card-text">Online since {{ $otheritem->created_at->format('d/m/Y \a\t H:i') }}</small>
                        <br><br>
                        <a href="{{ route('items.show', $otheritem->id) }}" class="btn btn-primary">Details</a>
                        @if(Auth::user() && Auth::user()->is_admin)
                        <a href="{{ route('items.edit', $otheritem->id) }}" class="btn btn-primary">Edit item</a>
                        @endif
                    </div>
            </div>
        @endif
        @endforeach
    </div><br><br>
    // extra functionaliteit dat users een comment kunnen laten?
</div>
@endsection