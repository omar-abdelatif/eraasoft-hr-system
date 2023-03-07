@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Employee Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <form action="{{route('Employee.create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Employee Name</label>
                                <input type="text" id="inputName" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee SSN</label>
                                <input type="text" id="inputName" name="ssn" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee Age</label>
                                <input type="text" id="inputName" name="age" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee Phone Number</label>
                                <input type="number" id="inputName" name="phone_number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee Address</label>
                                <input type="text" id="inputName" name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Upload Profile Img</label>
                                <input type="file" id="inputProjectLeader" name="img" class="form-control p-0"
                                    style="height: 2rem" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Job Details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputClientCompany">Employee Past Job</label>
                                <input type="text" id="inputClientCompany" name="past-job" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Employee Leader</label>
                                <input type="text" id="inputProjectLeader" name="leader" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Past Job Description</label>
                                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    <option selected="" disabled="">Select one</option>
                                    <option>Pending</option>
                                    <option>Rejected</option>
                                    <option>Approved</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Budget</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEstimatedBudget">Estimated budget</label>
                                <input type="number" id="inputEstimatedBudget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputSpentBudget">Total amount spent</label>
                                <input type="number" id="inputSpentBudget" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Estimated project duration</label>
                                <input type="number" id="inputEstimatedDuration" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <input type="submit" value="Create" class="btn btn-success text-right w-100 text-center">
                </div>
            </div>
        </form>
    </section>
@endsection
