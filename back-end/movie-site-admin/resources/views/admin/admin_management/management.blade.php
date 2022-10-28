@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid my-2">
        <div class="row d-flex flex-row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <legend class="text-center">Admin Profile</legend>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin#insertData') }}" method="post">
                            @csrf
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <div class="form-group row my-1">
                                        <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputName" name="name"
                                                placeholder="Enter name...">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email..." id="">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="" name="password"
                                                placeholder="Enter password...">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Confirm</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id=""
                                                name="confirmpassword" placeholder="Confirm your password...">
                                            @error('confirmpassword')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="" name="phone"
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
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row my-1">
                                        <label for="" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" placeholder="Enter address..."
                                                id="" class="form-control">
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3 mb-1 col-sm-9 offset-3">
                                        <button type="submit" class="btn btn-primary "><i
                                                class="fa-solid fa-circle-chevron-down me-2"></i>Insert
                                            Admin</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Edit | Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['phone'] }}</td>
                                <td>
                                    <a href="{{route('admin#editPage',$item['id'])}}" class="btn btn-sm btn-dark text-white"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    @if ($item['id'] != Auth::user()->id)
                                        <a href="{{ route('admin#deleteData', $item['id']) }}"
                                            class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if (session('insertSuccess'))
            <div class="alert col-5 alert-success mt-3 alert-dismissible fade show" role="alert">
                <strong>{{ session('insertSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('deleteSuccess'))
            <div class="alert col-5 alert-danger mt-3 alert-dismissible fade show" role="alert">
                <strong>{{ session('deleteSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('updateSuccess'))
            <div class="alert col-5 alert-warning mt-3 alert-dismissible fade show" role="alert">
                <strong>{{ session('updateSuccess') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
@endsection
