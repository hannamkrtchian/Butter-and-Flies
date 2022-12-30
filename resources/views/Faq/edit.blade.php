@extends('layouts.app')

@section('title', "Edit FAQ")

@section('content')

<div class="container">
    <h1>Edit the FAQ page.</h1>
    <br>
    <!-- show every category -->
    @foreach($categories as $category)
    <div class="d-flex flex-wrap" style="justify-content: center;">
        <div class="w-100">
            <!-- button -->
            <a class="btn btn-secondary w-100" data-bs-toggle="collapse" href="#multiCollapse{{ $category->id }}" role="button" aria-expanded="false" aria-controls="multiCollapse{{ $category->id }}">
                {{ $category->name }}</a><br><br>
            <!-- delete -->
            <div class="d-flex justify-content-center">
            <form method="POST" action="{{ route('faq.destroy.category', $category->id) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete category {{ $category->name }}" class="btn m-2 bg-danger text-white">
            </form>
            <!-- create new question -->
            <a href="{{ route('faq.create', $category->id) }}" class="btn m-2 bg-primary text-white">Create a new question</a>
        </div></div><br>
        <div class="collapse multi-collapse" id="multiCollapse{{ $category->id }}">
        @foreach($faqs as $faq)
        <br>
        @if($faq->category_id == $category->id)
        <div class="card card-body w-100">
            <h4>{{ $faq->question }}</h4>
            <hr>
            <p>{{ $faq->answer }}</p>
            <hr>

            <!-- edit question -->

            <form method="POST" action="{{ route('faq.update', $faq->id) }}">
                @csrf
                @method('PUT')

                <!-- edit question -->
                <div class="row mb-3">
                    <label for="question" class="col-md-4 col-form-label text-md-end">Question: </label>

                    <div class="col-md-6">
                        <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $faq->question }}" required autofocus>

                        @error('question')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- edit answer -->
                <div class="row mb-3">
                    <label for="answer" class="col-md-4 col-form-label text-md-end">Answer: </label>

                    <div class="col-md-6">
                        <textarea name="answer" id="answer" cols="30" rows="5" class="form-control" required>{{ $faq->answer }}</textarea>

                        @error('answer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- submit button -->
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Edit Question
                        </button>
                    </div>
                </div>
            </form>
            <hr>

            <!-- delete question -->

            <form method="POST" action="{{ route('faq.destroy', $faq->id) }}" class="d-flex justify-content-center">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete this question" class="btn m-2 bg-danger text-white">
            </form>

        </div>
        @endif
        @endforeach
        <br><br>
        </div>
    </div>
    <br><br>
    @endforeach
    <div>
        <form method="POST" action="{{ route('faq.store.category') }}">
        @csrf
        <div class="row justify-content-md-center">
            <label for="name" class="col col-form-label text-md-end">Name of category: </label>

            <div class="col">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- submit button -->
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    Add category
                </button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection