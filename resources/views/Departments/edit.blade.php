@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Department Edit Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Department Edit Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="{{route('departments.update')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="bg-secondary w-50 mx-auto p-3 rounded mt-5">
                        <div class="title">
                            <h1 class="text-center mt-2 mb-2">Edit Department Form</h1>
                        </div>
                        <div class="inputs">
                            <input type="hidden" value="{{$depart->id}}" name="id" placeholder="Position Id" class="form-control mb-3 text-center">
                            <input type="text" name="name" placeholder="Department Name" value="{{$depart->name}}" class="form-control mb-3">
                            <select name="manager_name" class="form-control custom_select mb-3">
                                <option selected>Choose Manager</option>
                                @foreach ($depart as $item)
                                    <option value="{{$item->manager_name}}">{{$item->manager_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Update" class="btn btn-success text-right w-100 text-center">
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
