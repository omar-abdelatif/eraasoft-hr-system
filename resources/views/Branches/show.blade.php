@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('All Branches') }}</h1>
                </div>
                <div class="col-sm-6">
                    <h1 class="text-right mb-3">
                        <a href="{{ route('Branche.addnew') }}" class="btn btn-success">{{ __('Add New Branche')}}</a>
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
                                <td class="text-center">Branche Name</td>
                                <td class="text-center">Branche Location</td>
                                <td class="text-center">Branche Manager</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($countBranches > 0)
                                @foreach ($allBranches as $branche)
                                    <tr>
                                        <td>{{$branche->id}}</td>
                                        <td>{{$branche->name}}</td>
                                        <td>{{$branche->location}}</td>
                                        <td>{{$branche->manager_name}}</td>
                                        <td>
                                            <a href="{{url("branche/$branche->id")}}" class="btn btn-warning">Edit</a>
                                            <a href="{{url("destroy/$branche->id")}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h1 class="text-center">No Branches To Show</h1>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
@endsection
