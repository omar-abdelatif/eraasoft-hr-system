@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Department Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Department Add</li>
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
        <form action="{{route('departments.create')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="bg-secondary w-50 mx-auto p-3 rounded mt-5">
                        <div class="title">
                            <h1 class="text-center mt-2 mb-2">Add Department Form</h1>
                        </div>
                        <div class="inputs">
                            <input type="text" name="name" placeholder="Department Name" class="form-control mb-3">
                            <select name="manager_name" class="form-control mb-3 custom-select">
                                <option selected>Select one</option>
                                @foreach ($manager as $manager)
                                    <option value="{{$manager->name}}">{{$manager->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Create" class="btn btn-success text-right w-100 text-center">
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
