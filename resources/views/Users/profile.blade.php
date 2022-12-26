@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br><h2>Your profile</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Your profile info: </h4><br>

                    
                        <div class="row d-flex">
                            <div class="col-md-3">
                                <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                            </div>
                            <div class="col-md-8">
                                <h1>{{ $user->name }}</h1>
                                <p class="fw-bold">Your e-mail address:</p> <p>{{ $user->email }}</p><br>
                                <p class="fw-bold">Your biography:</p> <p>{{ $user->biography }}</p><br>
                                <p class="fw-bold">Your birthday:</p> <p>{{ date('d/m/Y', strtotime($user->birthday)) }}</p><br>
                            </div>
                            </div>
                                <div class="text-center">
                                    <br><br>
                                    <!-- edit -->
                                    <a href="{{ route('edit', $user->id)  }}" class="btn btn-primary">Edit your profile</a>
                                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection