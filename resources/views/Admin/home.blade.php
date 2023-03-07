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
                        {{-- <div class="container-fluid"> --}}
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="info-box bg-success">
                                        <span class="info-box-icon">
                                            <i class="far fa-flag"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Admins</span>
                                            <span class="info-box-number">410</span>
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
                                            <span class="info-box-number">13,648</span>
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
                                            <span class="info-box-number">13,648</span>
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
                        {{-- </div> --}}
                    </div>
                    <table class="table borderd-table display align-middle text-center" id="table" data-order='[[ 1, "asc" ]]' data-page-length='25'>
                        <thead>
                            <tr>
                                <td class="text-center">id</td>
                                <td class="text-center">الإسم</td>
                                <td class="text-center">رقم التلفون</td>
                                <td class="text-center">تاريخ التسجيل</td>
                                <td class="text-center">Actions</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
