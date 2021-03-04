@extends('layouts.adminlayout')

@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <p>{{ Session::get('message') }}</p>
</div>
@endif
<section class="main-wrapper">
    <div class="page-color">
        <div class="page-header">
            <div class="page-title">
                Create User &amp; Assign Role</span>
            </div>
            <div class="page-btn">
                <a href="{{ route('assignrole.index') }}" class="add-btn">
                    <span>
                        <img src="{{url('/')}}/assets/image/Icon-arrow-back.svg" class="btn-arrow-show" alt="">
                        <img src="{{url('/')}}/assets/image/Icon-arrow-back-2.svg" class="btn-arrow-hide" alt="">
                    </span>
                    <span>Back</span>
                </a>
            </div>
        </div>

        <div class="profile-box">
            <div class="short-code">
                <form action="{{ route('assignrole.store') }}" method="POST" class="">
                    @csrf
                    <div class="form-group">
                        <label> User Name</label>
                        <input type="text" placeholder="" name="name" id="" class="form-control">
                        @error('name')
                        <label class="error" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>User Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> User Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="email" autofocus>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label> Assign Role</label>
                            <select name="user_type" id="user_type">
                                <option value="">--Select Role--</option>
                                        <option>Admin</option>
                                        <option>Accountant</option>
                                        <option>Manager</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <input type="submit" name="save" class="login-btn" id="save" value="Create User">
                    </div>



                </form>
            </div>

        </div>
    </section>
@endsection