@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Position Edit Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Position Edit Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    <p class="m-0 text-center">{{$error}}</p>
                </div>
            @endforeach
        @endif
        <form action="{{route('position.update')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="bg-secondary w-50 mx-auto p-3 rounded mt-5">
                        <div class="title">
                            <h1 class="text-center mt-2 mb-2">Edit Position Form</h1>
                        </div>
                        <div class="inputs">
                            <input type="text" name="name" placeholder="Position Name" value="{{$edit->name}}" class="form-control mb-3">
                        </div>
                        <input type="submit" value="Update" class="btn btn-success text-right w-100 text-center">
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
