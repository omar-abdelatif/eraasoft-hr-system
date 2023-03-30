@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Employee Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Admin.home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Employee Info</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center">
                    <p class="m-0">{{ $error }}</p>
                </div>
            @endforeach
        @endif
        <form action="{{ route('Employee.update') }}" method="post" enctype="multipart/form-data">
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
                                <label for="inputName">Employee ID</label>
                                <input type="hidden" id="inputName" value="{{ $edit->id }}" name="id"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee Name</label>
                                <input type="text" id="inputName" value="{{ $edit->name }}" name="name"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee SSN</label>
                                <input type="number" id="inputName" value="{{ $edit->ssn }}" name="ssn"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee Age</label>
                                <input type="number" id="inputName" value="{{ $edit->age }}" name="age"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee Phone Number</label>
                                <input type="number" id="inputName" value="{{ +20 . $edit->phone_number }}"
                                    name="phone_number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Employee Address</label>
                                <input type="text" id="inputName" value="{{ $edit->address }}" name="address"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Upload Profile Img</label>
                                <img src="{{ asset('images/employee/' . $edit->img) }}" alt="{{ $edit->name }}"
                                    class="d-block mx-auto rounded-circle mb-4" width="100">
                                <input type="file" id="inputProjectLeader" value="{{ $edit->img }}" name="img"
                                    class="form-control p-0" style="height: 2rem" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Upload CV</label>
                                <div class="text-center mb-2">
                                    <a href="{{ asset('files/' . $edit->pdf) }}" class="text-decoration-none" target="_blank"
                                        rel="noopener noreferrer">
                                        <i class="far fa-file-pdf fa-2x" style="color: #000"></i>
                                    </a>
                                </div>
                                <input type="file" id="inputProjectLeader" name="pdf" value="{{$edit->pdf}}" class="form-control p-0" accept="application/pdf" style="height: 2rem">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Job Details</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputClientCompany">Employee Past Job</label>
                                <input type="text" id="inputClientCompany" value="{{ $edit->pastjob }}"
                                    name="pastjob" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Employee Leader</label>
                                <input type="text" id="inputProjectLeader" value="{{ $edit->leader }}"
                                    name="leader" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Past Job Description</label>
                                <textarea id="inputDescription" name="job_desc" class="form-control" rows="4">{{ $edit->job_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus" name="status" class="form-control custom-select">
                                    <option selected>Select one</option>
                                    <option value="Pending" {{ $edit->status == 'Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="Rejected" {{ $edit->status == 'Rejected' ? 'selected' : '' }}>Rejected
                                    </option>
                                    <option value="Approved" {{ $edit->status == 'Approved' ? 'selected' : '' }}>Approved
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputSalary">Employee Salary</label>
                                <input type="number" id="inputSalary" value="{{ $edit->salary }}" name="salary"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <input type="submit" value="Update" class="btn btn-success text-right w-100 text-center">
                </div>
            </div>
        </form>
    </section>
@endsection
