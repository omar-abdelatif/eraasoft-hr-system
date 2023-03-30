@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-lg-12">
                    <div class="box-info">
                        {{-- ! Info Box ! --}}
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="info-box bg-success">
                                    <span class="info-box-icon">
                                        <i class="far fa-flag"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Admins</span>
                                        <span class="info-box-number">{{ $adminCount }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-box bg-gradient-warning">
                                    <span class="info-box-icon">
                                        <i class="far fa-copy"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Managers</span>
                                        <span class="info-box-number">{{ $managerCount }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-box bg-info">
                                    <span class="info-box-icon">
                                        <i class="far fa-copy"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Employees</span>
                                        <span class="info-box-number">{{ $employeesCount }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-box bg-danger">
                                    <span class="info-box-icon">
                                        <i class="far fa-copy"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Departments</span>
                                        <span class="info-box-number">13,648</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="info-box bg-primary">
                                    <span class="info-box-icon">
                                        <i class="far fa-copy"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Branches</span>
                                        <span class="info-box-number">13,648</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success text-center mt-5">
                            <p class="mb-0">{{ session('success') }}</p>
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger text-center mt-5">
                            <p class="mb-0">{{ session('error') }}</p>
                        </div>
                    @endif
                    <table class="table borderd-table display align-middle text-center w-100" id="table" data-order='[[ 0, "asc" ]]' data-page-length='10'>
                        <thead>
                            <tr class="text-center">
                                <td class="text-center">id</td>
                                <td class="text-center">name</td>
                                <td class="text-center">age</td>
                                <td class="text-center">Phone Number</td>
                                <td class="text-center">SSN</td>
                                <td class="text-center">Address</td>
                                <td class="text-center">Position</td>
                                <td class="text-center">Past Job</td>
                                <td class="text-center">Leader</td>
                                <td class="text-center">Job Description</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">Salary</td>
                                <td class="text-center">Profile Image</td>
                                <td class="text-center">Files</td>
                                <td class="text-center">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($employeesCount >= 1)
                                @foreach ($employees as $employee)
                                    <tr class="text-center">
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->age }}</td>
                                        <td>{{ $employee->phone_number }}</td>
                                        <td>{{ $employee->ssn }}</td>
                                        <td>{{ $employee->address }}</td>
                                        <td>{{$employee->position}}</td>
                                        <td>{{ $employee->pastjob }}</td>
                                        <td>{{ $employee->leader }}</td>
                                        <td>{{ $employee->job_desc }}</td>
                                        <td>{{ $employee->status }}</td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>
                                            <img class="img-circle elevation-2" width="50px" src="{{ asset('images/employee/' . $employee->img) }}" alt="{{ $employee->name }}">
                                        </td>
                                        <td>
                                            <a href="{{asset('files/' . $employee->pdf)}}" class="text-decoration-none" target="_blank" rel="noopener noreferrer">
                                                <i class="far fa-file-pdf fa-2x" style="color: #000"></i>
                                            </a>
                                        </td>
                                        <td class="d-flex">
                                            <a href='{{ url("edit/$employee->id") }}' class="btn btn-warning">
                                                <i class="fas fa-edit" style="color: #000000;"></i>
                                            </a>
                                            <a href='{{ url("delete/$employee->id") }}' class="btn btn-danger">
                                                <i class="fas fa-trash-alt" style="color: #ffffff;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h1 class="text-center">No Employees To Show</h1>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
