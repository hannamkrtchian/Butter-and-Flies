@extends((Auth::user() && Auth::user()->is_admin) ? 'layouts.admin' : 'layouts.app')

@section('title', "Contact")

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <!-- email -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Your email address: </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- question -->
                        <div class="row mb-3">
                            <label for="question" class="col-md-4 col-form-label text-md-end">Your question: </label>

                            <div class="col-md-6">
                                <textarea name="question" id="question" cols="30" rows="5" class="form-control" required>{{ old('question') }}</textarea>

                                @error('question')
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
                                    Send question
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection