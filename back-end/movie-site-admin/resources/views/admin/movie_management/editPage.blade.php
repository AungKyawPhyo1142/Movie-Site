@extends('admin.layouts.master')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <legend class="text-center text-uppercase">{{$data->title}}</legend>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 d-flex justify-content-center align-items-center">
                                <img style="height: 300px" src="{{asset('storage/'.$data->image)}}" class="img-thumbnail" alt="">
                            </div>
                            <div class="col">
                                <form action="{{route('movie#updateData',$data->id)}}" method="post" enctype="multipart/form-data">
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
                                                                placeholder="Enter movie title..." value="{{$data->title}}">
                                                            @error('title')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label for="" class="col-sm-3 col-form-label">Rated</label>
                                                        <div class="col-sm-9">
                                                            <select name="rated" class="form-control" id="">
                                                                <option value="g" @if($data->rated=='g') selected @endif>G</option>
                                                                <option value="pg" @if($data->rated=='pg') selected @endif>PG</option>
                                                                <option value="pg-13" @if($data->rated=='pg-13') selected @endif>PG-13</option>
                                                                <option value="r" @if($data->rated=='r') selected @endif>R</option>
                                                                <option value="nc-17" @if($data->rated=='nc-17') selected @endif>NC-17</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label for="" class="col-sm-3 col-form-label">Genre</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="genre" placeholder="Enter Movie Genre..."
                                                                id="" class="form-control" value="{{$data->genre}}">
                                                            @error('genre')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row my-2">
                                                        <label for="" class="col-sm-3 col-form-label">IMDb</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="rating" placeholder="Enter IMDb Rating..."
                                                                id="" class="form-control" value="{{$data->rating}}">
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
                                                                placeholder="Google Drive Link Here..." value="{{$data->gdrive_link}}">
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
                                                                class="form-control" value="{{$data->mdrive_link}}">
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
                                                                placeholder="Movie Description...">{{$data->description}}</textarea>
                                                            @error('description')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mt-2">
                                                <div class="col">
                                                    <a href="{{route('movie#list')}}" class="btn w-100 btn-secondary"><i class="fa-solid fa-angle-left me-2"></i>Back</a>
                                                </div>

                                                <div class="col">
                                                    <button type="submit" class="btn w-100 btn-primary ">
                                                        <i class="fa-solid fa-pen-to-square me-2"></i>
                                                        Update Movie Data
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-5 "><small class="text-muted">Created At: {{$data->created_at->format('M d, Y (g:i A)')}}</small></div>
                    <div class="col text-end"><small class="text-muted">Updated At: {{$data->updated_at->format('M d, Y (g:i A)')}}</small></div>
                </div>

            </div>

        </div>
    </div>
@endsection
