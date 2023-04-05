@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('All Departments') }}</h1>
                </div>
                <div class="col-sm-6">
                    <h1 class="text-right mb-3">
                        <a href="{{ route('departments.addnew') }}" class="btn btn-success">{{ __('Add New Department')}}</a>
                    </h1>
                </div>
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
                                <td class="text-center">#</td>
                                <td class="text-center">Department Name</td>
                                <td class="text-center">Department Manager</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($departmentCount > 0)
                                @foreach ($departments as $departments)
                                    <tr>
                                        <td>{{$departments->id}}</td>
                                        <td>{{$departments->name}}</td>
                                        <td>{{$departments->manager_name}}</td>
                                        <td>
                                            <a href="{{url("editdepartment/$departments->id")}}" class="btn btn-warning">Edit</a>
                                            <a href="{{url("deletedepartment/$departments->id")}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h1 class="text-center">No Departments To Show</h1>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
@endsection
