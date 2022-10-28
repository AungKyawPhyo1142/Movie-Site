@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-between my-2">

            <div class="col-sm-3">
                <a href="{{route('movie#management')}}" class="btn btn-secondary"><i class="fa-solid fa-angle-left me-2"></i>Back</a>
            </div>

            <form action="{{route('movie#search')}}" class="col-sm-3" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="search" name="searchKey" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                    <a href="{{route('movie#list')}}" class="btn btn-outline-secondary" type="button">All</a>
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table table-hover text-nowrap text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Rating</th>
                        <th>Rated</th>
                        <th>Edit | Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>
                                <img style="height: 100px" src="{{asset('/movie_posters/'.$item['image'])}}" class="img-thumbnail" alt="">
                            </td>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['genre'] }}</td>
                            <td>{{ $item['rating'] }}</td>
                            <td>{{ $item['rated'] }}</td>
                            <td>
                                <a href="{{route('movie#editPage',$item['id'])}}" class="btn btn-sm btn-dark text-white"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                                <a href="{{route('movie#delete',$item['id'])}}"
                                        class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="">
                {{$data->links()}}
            </div>

        </div>
    </div>
@endsection
