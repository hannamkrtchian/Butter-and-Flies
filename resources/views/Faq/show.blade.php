@extends((Auth::user() && Auth::user()->is_admin) ? 'layouts.admin' : 'layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="container">
    <h1>This is the FAQ page.</h1>
    <h3>Choose a category:</h3>
    <br><br>
    @foreach($categories as $category)
    <div class="d-flex flex-wrap" style="justify-content: center;">
        <p class="w-100">
            <a class="btn btn-secondary w-100" data-bs-toggle="collapse" href="#multiCollapse{{ $category->id }}" role="button" aria-expanded="false" aria-controls="multiCollapse{{ $category->id }}">{{ $category->name }}</a>
        </p>
        <div class="collapse multi-collapse" id="multiCollapse{{ $category->id }}">
        @foreach($faqs as $faq)
        @if($faq->category_id == $category->id)
        <div class="card card-body">
            <h4>{{ $faq->question }}</h4>
            <hr>
            <p>{{ $faq->answer }}</p>
        </div>
        <br>
        @endif
        @endforeach
        <br><br>
        </div>
    </div>
    @endforeach
</div>
@endsection