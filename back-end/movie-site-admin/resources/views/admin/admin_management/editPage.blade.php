@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        {{-- <legend class="text-center">Admin Profile</legend>     --}} {{-- Timezone::convertToLocal($post->created_at, 'Y-m-d g:i', true);--}}
                        <div class="row d-flex justify-content-between">
                            <div class="col-5 "><small class="text-muted">Created At: {{$data->created_at->format('M d, Y (g:i A)')}}</small></div>
                            <div class="col text-end"><small class="text-muted">Updated At: {{$data->updated_at->format('M d, Y (g:i A)')}}</small></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin#update',$data->id) }}" method="post">
                            @csrf
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <div class="form-group row my-1">
                                        <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputName" name="name"
                                                placeholder="Enter name..." value="{{$data->name}}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email..." value="{{$data->email}}" id="">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="" value="{{$data->phone}}" name="phone"
                                                placeholder="Enter phone...">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select name="gender" id="" class="form-control">
                                                <option value="male" @if($data->gender=='male') selected @endif>Male</option>
                                                <option value="female" @if($data->gender=='female') selected @endif>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" placeholder="Enter address..."
                                                id="" class="form-control" value="{{$data->address}}">
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3 mb-1 col-sm-9 offset-3">
                                        <button type="submit" class="btn btn-primary ">
                                            <i class="fa-solid fa-pen-to-square me-2"></i>
                                            Update Account Info
                                        </button>
                                        <a href="{{route('admin#management')}}" class="mt-1 btn btn-secondary"><i class="fa-solid fa-angle-left me-2"></i>Back</a>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
