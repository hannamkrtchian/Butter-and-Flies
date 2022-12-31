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

                    <br>
                    <h4>GitHub: </h4> <br>
                    <a href="https://github.com/hannamkrtchian/Butter-and-Flies">
                        My GitHub repository.
                    </a> <br><br><hr><br>

                    <h4>Sources:</h4> <br>
                    <a href="https://ehb.instructuremedia.com/embed/edeb8a9e-3e8f-4af3-85f9-8be5ae754e7d">
                        1. I followed the course material, especially the video about the guestbook. 
                    </a> <br><br>
                    <a href="https://laravel.com/docs/7.x">2. Laravel Documentation, especially for database migrations and functions on arrays.</a><br><br>
                    <a href="https://getbootstrap.com/">3. Bootstrap for design.</a><br><br>
                    <a href="https://www.php.net/docs.php">4. The PHP Manual, especially for the use of certain functions.</a><br><br><hr><br>

                    <h4>Start project: </h4> <br>
                    <p> Run "npm run dev" and "php artisan serve" in terminal.</p> <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection