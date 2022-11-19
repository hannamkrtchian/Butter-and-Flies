@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br><h2>Profile</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Your profile info: </h4><br>

                    
                        <div class="row d-flex">
                            <div class="col-md-2">
                                <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                            </div>
                            <div class="col-md-5 ">
                                <h1>{{ $user->name }}</h1>
                                <p>Your e-mail address: {{ $user->email }}</p>
                                <p>Your biography: {{ $user->biography }}</p>
                                <p>Your birthday: {{ $user->birthday }}</p><br>
                            </div>
                            </div>
                                <div class="col-md-3 text-center">
                                    <br><br>
                                    <!-- edit -->
                                    <a href="#" class="btn btn-primary">Edit your profile</a>
                                </div>
                            
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection