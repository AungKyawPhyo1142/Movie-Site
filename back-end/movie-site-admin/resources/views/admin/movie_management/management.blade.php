@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="card h-100 shadow-sm">
                    <div class="card-header">
                        <legend class="text-center">Movie Informations</legend>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('movie#insertData') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <div class="row">
                                        <div class="col">
                                            {{-- Col-Left --}}
                                            <div class="form-group row my-2">
                                                <label for="inputName" class="col-sm-3 col-form-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputName" name="title"
                                                        placeholder="Enter movie title...">
                                                    @error('title')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="" class="col-sm-3 col-form-label">Rated</label>
                                                <div class="col-sm-9">
                                                    <select name="rated" class="form-control" id="">
                                                        <option value="g">G</option>
                                                        <option value="pg">PG</option>
                                                        <option value="pg-13">PG-13</option>
                                                        <option value="r">R</option>
                                                        <option value="nc-17">NC-17(Adult Only)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="" class="col-sm-3 col-form-label">Genre</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="genre" placeholder="Enter Movie Genre..."
                                                        id="" class="form-control">
                                                    @error('genre')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="" class="col-sm-3 col-form-label">IMDb</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="rating" placeholder="Enter IMDb Rating..."
                                                        id="" class="form-control">
                                                    @error('rating')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="" class="col-sm-3 col-form-label">Poster</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="image" class="form-control"
                                                        id="">
                                                    @error('image')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="" class="col-sm-3 col-form-label">G-Drive</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="" name="glink"
                                                        placeholder="Google Drive Link Here...">
                                                    @error('glink')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label for="" class="col-sm-3 col-form-label">Mega</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="mlink"
                                                        placeholder="MEGA Drive Link Here..." id=""
                                                        class="form-control">
                                                    @error('mlink')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">
                                            {{-- Col-Right --}}
                                            <div class="form-group row my-1">
                                                <label for="" class="col-sm-3 col-form-label">About</label>
                                                <div class="col-sm-9">
                                                    <textarea name="description" id="" class="form-control" cols="30" rows="10"
                                                        placeholder="Movie Description..."></textarea>
                                                    @error('description')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group my-1">
                                                {{-- Alert Boxes --}}
                                                @if (session('insertSuccess'))
                                                    <div class="alert col alert-success mt-3 alert-dismissible fade show"
                                                        role="alert">
                                                        <strong>{{session('insertSuccess')}}</strong>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <button type="submit" class="btn btn-primary ">
                                            <i class="fa-solid fa-circle-chevron-down me-2"></i>
                                            Insert
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <a href="{{ route('movie#list') }}" class="text-dark text-decoration-none">
                    <div class="card h-100 shadow-sm mb-3">
                        <img src="{{ asset('movieCard/movieList-card.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column justify-content-center ">
                            <h5 class="card-title">Check Movie List</h5>
                            <p class="card-text mt-1">
                                List of movies and can manage whether you want to edit or delete.
                            </p>
                        </div>
                    </div>

                </a>
            </div>
        </div>
        <div class="row">
            <a href="https://www.joblo.com/movie-posters/" target="blink" class="text-muted text-sm">Click here to download movie posters</a>
        </div>
    </div>
@endsection
