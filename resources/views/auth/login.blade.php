@extends('layouts.authlayout')
@section('content')
<section class="login">
    <div class="login-page">
        <div class="login-page-inr">
            <div class="login-left">
            <div class="logo-box">
            <a href="#">
                <img src="{{url('/')}}/assets/image/new-logo.svg" alt="">
            </a>
        </div>
        <div class="copyright-box">
            <p>@<?php echo date("Y"); ?> <a href="">gbconvent.in</a> All right reserved.</p>
        </div>
            </div>
            <div class="login-right">
                <div class="login-bg">
                    @if(Session::has('message'))
                    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <p>{{ Session::get('message') }}</p>
                    </div>
                    @endif
                    <div class="login-head">
                    <h3 class="login-heading">Login</h3>
                        <p>Welcome back to GB Convent Please login to your account</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>User Name</label>
                            <div class="user-name">
                            <input id="name" type="text" class="user-name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="pass-word">
                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input type="submit" class="login-btn" name="" id="" value="Login">
                    </form>
                    <div class="text-center">
                        @if (Route::has('password.request'))
                        <p><a href="{{ route('password.request') }}"> Forget Password?</a></p>
                        @endif
                        <p>No access yet? <a href="{{ route('register') }}"> Register Here </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection