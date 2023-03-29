@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('All Managers') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h1 class="text-right mb-3">
                        <a href="{{ route('Manager.addNew') }}" class="btn btn-success">Add New Manager</a>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger text-center mt-5">
                                <p class="mb-0">{{ $error }}</p>
                            </div>
                        @endforeach
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success text-center mt-5">
                            <p class="mb-0">{{ session('success') }}</p>
                        </div>
                    @endif
                    <table class="table borderd-table display align-middle text-center w-100" id="table" data-order='[[ 0, "asc" ]]' data-page-length='25'>
                        <thead>
                            <tr class="text-center">
                                <td class="text-center">id</td>
                                <td class="text-center">name</td>
                                <td class="text-center">age</td>
                                <td class="text-center">Phone Number</td>
                                <td class="text-center">SSN</td>
                                <td class="text-center">Address</td>
                                <td class="text-center">Job Description</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">Salary</td>
                                <td class="text-center">Profile Image</td>
                                <td class="text-center">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($managersCount >= 1)
                                @foreach ($managers as $manager)
                                    <tr class="text-center">
                                        <td>{{ $manager->id }}</td>
                                        <td>{{ $manager->name }}</td>
                                        <td>{{ $manager->age }}</td>
                                        <td>{{ $manager->phone_number }}</td>
                                        <td>{{ $manager->ssn }}</td>
                                        <td>{{ $manager->address }}</td>
                                        <td>{{ $manager->job_desc }}</td>
                                        <td>{{ $manager->status }}</td>
                                        <td>{{ $manager->salary }}</td>
                                        <td>
                                            <img class="img-circle elevation-2" width="50px"
                                                src="{{ asset('images/manager/' . $manager->img) }}"
                                                alt="{{ $manager->name }}">
                                        </td>
                                        <td>
                                            <a href='{{ url("editmanager/$manager->id") }}' class="btn btn-warning">Edit</a>
                                            <a href='{{ url("deletemanager/$manager->id") }}' class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h1 class="text-center">No Managers To Show</h1>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
