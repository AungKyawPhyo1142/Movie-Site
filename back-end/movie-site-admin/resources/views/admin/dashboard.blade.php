@extends('admin.layouts.master')

@section('content')
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="row">
            {{-- card 1 --}}
            <div class="col-4">
                <div class="card shadow-sm" style="width: 18rem; height: 25rem;">
                    <img src="{{ asset('cardImages/admin-card.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title h3">Manage Admins</h3>
                        <div class="">
                            <a href="" class="btn w-100 btn-primary">Go</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- card 2 --}}
            <div class="col-4">
                <div class="card shadow-sm" style="width: 18rem; height: 25rem;">
                    <img src="{{ asset('cardImages/movie-card.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title h3">Manage Movies</h3>
                        <div class="">
                            <a href="#" class="btn w-100 btn-primary">Go</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- card 3 --}}
            <div class="col-4">
                <div class="card" style="width: 18rem; height: 25rem;">
                    <img src="{{ asset('cardImages/website-card.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title h3">Website Statistics</h3>
                        <div class="">
                            <a href="#" class="btn w-100 btn-primary">Go</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
