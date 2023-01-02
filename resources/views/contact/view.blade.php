@extends('layouts.admin')

@section('title', "User's questions")

@section('content')

<div class="container">
    <h1>Here are the questions from the users.</h1>
    <br><br>
    @foreach($questions as $question)
    <div class="d-flex flex-wrap" style="justify-content: center;">
        <div class="card card-body">
                <h4>{{ $question->question }}</h4>
                <hr>
                <p>{{ $question->email }}</p>

                <!-- delete question -->
                <form method="POST" action="{{ route('contact.destroy', $question->id) }}" class="d-flex justify-content-end">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete this question" class="btn m-2 bg-danger text-white">
                </form>
            </div>
        </div>
        <br>
    @endforeach
</div>

@endsection