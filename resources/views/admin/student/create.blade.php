@extends('layouts.adminlayout')

@section('content')
<div class="page-inner ad-inr">
    @if(Session::has('message'))
    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif
    <section class="main-wrapper">
        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    Add <span> Student</span>
                </div>
            </div>
            <div class="page-table">
                <div class="profile-box container-fluid">
                    <form class="add-student-form" method="Post" action="{{route('students.store')}}" enctype="multipart/form-data">
                        <!-- <div class="profile-title">
                                Personal Information
                            </div> -->
                         @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Student Id</label>
                                    <input type="text" name="student_id" id="student_id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Scholar No.</label>
                                    <input type="text" name="scholar_no" id="scholar_no">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Father name</label>
                                    <input type="text" name="father_name" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mother name</label>
                                    <input type="text" name="mother_name" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aadhar No.</label>
                                    <input type="number" name="aadhar_no" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Samagra Id</label>
                                    <input type="number" name="samarg_id" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" name="dob" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="gbs_id" id="gbs_id">
                                    <option value="" selected>Select Class</option>
                                    @foreach($tests as $test)
                                        <option value="{{$test->id}}" >{{$test->class_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile No. 1</label>
                                    <input type="number" name="mobile_no" id="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile No. 2</label>
                                    <input type="number" name="mobile_no2" id="">
                                </div>
                            </div>
                            <div class="col-md-6 last-input-margin">
                                <div class="form-group">
                                    <label>Add Session</label>
                                    <select name="add_session">
                                    <option value="" selected>Select Session</option>
                                        <option>2018-2019</option>
                                        <option>2019-2020</option>
                                        <option>2020-2021</option>
                                        <option>2021-2022</option>
                                        <option>2022-2023</option>
                                        <option>2023-2024</option>
                                        <option>2024-2025</option>
                                        <option>2025-2026</option>
                                        <option>2026-2027</option>
                                        <option>2027-2028</option>
                                        <option>2028-2029</option>
                                        <option>2029-2030</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 last-input-margin">
                                <div class="form-group">
                                    <label>Bank Account No.</label>
                                    <input type="number" name="account_no" id="account_no">
                                </div>
                            </div>
                            <div class="col-md-6 last-input-margin">
                                <div class="form-group">
                                    <label> Picture </label>
                                    <input type="file" name="profile_picture" id="profile_picture">
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <input type="submit" name="save" class="add-btn" id="save" value="Add Student">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @endsection
    @section('additionalscripts')


    @endsection