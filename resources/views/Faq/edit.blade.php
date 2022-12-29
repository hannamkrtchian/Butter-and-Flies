@extends('layouts.app')

@section('title', "Edit FAQ")

@section('content')

<div class="container">
    <h1>Edit the FAQ page.</h1>
    <br>
    <!-- show every category -->
    @foreach($categories as $category)
    <div class="d-flex flex-wrap" style="justify-content: center;">
        <p class="w-100">
            <!-- button -->
            <a class="btn btn-secondary w-100" data-bs-toggle="collapse" href="#multiCollapse{{ $category->id }}" role="button" aria-expanded="false" aria-controls="multiCollapse{{ $category->id }}">
                {{ $category->name }}</a><br><br>
            <!-- delete -->
            <form method="POST" action="{{ route('faq.destroy.category', $category->id) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete category {{ $category->name }}" class="btn m-2 bg-danger text-white">
            </form>
            <a href="{{ route('faq.create', $category->id) }}" class="btn m-2 btn-primary">Create a new question</a>
        </p>
        <div class="collapse multi-collapse" id="multiCollapse{{ $category->id }}">
        @foreach($faqs as $faq)
        @if($faq->category_id == $category->id)
        <div class="card card-body w-100">
            <h4>{{ $faq->question }}</h4>
            <hr>
            <p>{{ $faq->answer }}</p>
        </div>
        @endif
        @endforeach
        <br><br>
        </div>
    </div>
    <br><br>
    @endforeach
</div>

@endsection