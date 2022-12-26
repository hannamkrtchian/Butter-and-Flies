@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br><h2>Profile of {{ $user->name }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Profile info: </h4><br>

                    
                        <div class="row d-flex">
                            <div class="col-md-3">
                                <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                            </div>
                            <div class="col-md-8">
                                <h1>{{ $user->name }}</h1>
                                <p class="fw-bold">E-mail address:</p> <p>{{ $user->email }}</p><br>
                                <p class="fw-bold">Biography:</p> <p>{{ $user->biography }}</p><br>
                                <p class="fw-bold">Birthday:</p> <p>{{ date('d F Y', strtotime($user->birthday)) }}</p><br>
                            </div>
                            </div>
                            <!-- user can edit his own profile -->
                            @if (Auth::User() == $user)
                                <div class="text-center">
                                    <br><br>
                                    <!-- edit -->
                                    <a href="{{ route('edit', $user->id)  }}" class="btn btn-primary">Edit your profile</a>
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection