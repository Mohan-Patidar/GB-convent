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
                    <h3><span>User Profile</span></h3>
                </div>
            </div>
    
    <div class="inr-page-sec">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Basic Information</h4>
                        </div>
                        @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <p>{{ Session::get('message') }}</p>
                        </div>
                        @endif
                        <div class="panel-body">
                            <form method="POST" id="profile-details" action="{{route('profile.store')}}" novalidate>
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First
                                                Name</label>
                                            <input type="text" name="name" id="name" required class="form-control"
                                                value='{{$user->name}}'>

                                            @error('name')
                                            <label class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" required name="lname" class="form-control"
                                                placeholder="Last Name" value="{{$user->lname}}">
                                            @error('last_name')
                                            <label class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" required
                                                class="form-control" value='{{$user->email}}'>
                                            @error('email')
                                            <label class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    <button type="submit" class="btn btn-primary margin-top-15">Update</button>
                            </form>
                            <div class="panel-heading clearfix margin-top-15">
                                <h4 class="panel-title">Change Password</h4>
                            </div>
                            @if(Session::has('message-password'))
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <p>{{ Session::get('message-password') }}</p>
                            </div>
                            @endif
                            <form method="post" id="profile-password" action="{{route('updatepassword')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           
                                            <input type="password" name='oldpassword' required placeholder="Current Password"
                                                class="form-control @error('password') is not current password @enderror">
                                            @error('oldpassword')
                                            <label class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          
                                            <input type="password" required name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="New Password">
                                            @error('password')
                                            <label class="error" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           
                                            <input type="password" required name="cpassword" class="form-control"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary margin-top-15">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- Main Wrapper -->
    </div><!-- /Page Inner -->
    </section>
</div><!-- /Page Content -->
@endsection

@section('additionalscripts')
<script>
    $("#profile-details").validate();
    // $("#profile-picture").validate();
    $("#profile-password").validate();
</script>
@endsection