@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="manager-cv">
                        <div class="card-header resume">
                            <div class="card-img text-center">
                                <img src="{{ asset('images/manager/' . $manager->img) }}" width="100" height="100"
                                    class="rounded-circle" alt="{{ $manager->img }}">
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-content-member p-3">
                                <h4 class="mt-0 text-center">{{ $manager->name }}</h4>
                                <h5 class="text-center">Department: not yet</h5>
                                <p class="text-center">
                                    <i class="fa fa-mobile"></i>
                                    {{ $manager->phone_number }}
                                </p>
                            </div>
                            <div class="card-content-languages">
                                <div class="card-content-languages-group"></div>
                                <div class="card-content-languages-group">
                                    <p class="resumecaption mb-3 bg-primary p-3 rounded text-center">Personal Information
                                    </p>
                                    <table class="table table-hover text-center" width="100%">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $manager->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone Number</th>
                                                <td>{{ $manager->phone_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email Address</th>
                                                <td>Soon</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-content-languages-group">
                                    <p class="resumecaption bg-success p-3 rounded text-center">Bio-Graphical Information
                                    </p>
                                    <table class="table table-hover text-center" width="100%">
                                        <tbody>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td>Soon</td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>Soon</td>
                                            </tr>
                                            <tr>
                                                <th>Marital Status</th>
                                                <td>Soon</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="manager-cv-info">
                        <div class="row">
                            <div class="col-12">
                                <p class="resumecaption text-center bg-info p-3">Positional Information</p>
                                <table class="table table-hover" width="100%">
                                    <tbody>
                                        <tr>
                                            <th>Position</th>
                                            <td>{{$manager->position}}</td>
                                        </tr>
                                        <tr>
                                            <th>Duty Type</th>
                                            <td>Full Time</td>
                                        </tr>
                                        <tr>
                                            <th>Hire Date</th>
                                            <td>{{$manager->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Joining Date</th>
                                            <td>{{$manager->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Home Department</th>
                                            <td>Soon</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
