@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><br><h2>About</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Sources:</h4> <br>
                    <p>1. I followed the course material, especially the video about the guestbook. 
                        (https://ehb.instructuremedia.com/embed/edeb8a9e-3e8f-4af3-85f9-8be5ae754e7d)</p>
                    <p>2. Laravel Documentation, especially for database migrations (https://laravel.com/docs/7.x)</p>
                    <p></p>
                    <p>?. Bootstrap for design (https://getbootstrap.com/)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection