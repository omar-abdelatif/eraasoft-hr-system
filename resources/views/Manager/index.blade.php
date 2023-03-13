@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('All Manages') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h1 class="text-right">
                        <a href="{{route('Manager.addnew')}}" class="btn btn-success">Add New Manager</a>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <h1 class="text-center">صفحة كل المدراء</h1>
@endsection
