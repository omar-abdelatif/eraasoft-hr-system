@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('All Employees') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h1 class="text-right">
                        <a href="{{route('Employee.addnew')}}" class="btn btn-success">Add New Employee</a>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <h1 class="text-center">صفحة الموظف</h1>
@endsection
