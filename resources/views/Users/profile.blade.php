@extends((Auth::user() && Auth::user()->is_admin) ? 'layouts.admin' : 'layouts.app')

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
                            <!-- user or admin can edit or delete this profile -->
                            @if (Auth::User() == $user || Auth::User()->is_admin)
                                <div class="text-center">
                                    <br><br>
                                    <!-- edit -->
                                    <a href="{{ route('users.edit', $user->id)  }}" class="btn btn-primary">Edit profile</a>
                                    <!-- delete account -->
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete account" class="btn m-2 bg-danger text-white">
                                    </form>
                                </div>
                            @endif

                            <!-- admin can make this user admin -->
                            @if (!$user->is_admin && Auth::User()->is_admin)
                                <div class="text-center">
                                    <!-- make user admin -->
                                    <form method="POST" action="{{ route('users.makeAdmin', $user->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" value="Make this user admin" class="btn m-2 bg-warning">
                                    </form>
                                </div>
                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection