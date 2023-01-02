@extends((Auth::user() && Auth::user()->is_admin) ? 'layouts.admin' : 'layouts.app')

@section('title', "Edit Item")

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Item</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('items.update', $item->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- titel edit item -->
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title: </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $item->title }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- description item -->
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description: </label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" required>{{ $item->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- prijs item -->
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Price: </label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $item->price }}" required autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- foto item -->
                        <div class="row mb-3">
                            <label for="picture" class="col-md-4 col-form-label text-md-end">Picture: </label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ $item->picture }}" required autofocus>

                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- categorie item -->
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">Category: </label>

                            <div class="col-md-6">
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="clothes" value="Clothes">
                                    <label class="form-check-label" for="clothes">
                                        Clothes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="shoes" value="Shoes">
                                    <label class="form-check-label" for="shoes">
                                        Shoes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="accessories" value="Accessories">
                                    <label class="form-check-label" for="accessories">
                                        Accessories
                                    </label>
                                </div>

                                @error('category')
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
                                    Edit Item
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