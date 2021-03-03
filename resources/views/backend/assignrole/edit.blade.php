@extends('layouts.adminlayout')

@section('content')
<section class="main-wrapper">
    <div class="page-color">
        <div class="page-header">
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="">Edit User &amp; Role</h2>
            </div>
            <div class="page-btn">
                        <a href="{{ route('assignrole.index') }}" class="">
                            <span>
                                    <img src="{{url('/')}}/assets/image/Icon-arrow-back.svg" class="btn-arrow-show" alt="">
                                    <img src="{{url('/')}}/assets/image/Icon-arrow-back-2.svg" class="btn-arrow-hide" alt="">
                                </span>
                            <span>Back</span>
                        </a>
                    </div>
    
                <a href="{{ route('role.create') }}" class="">
                <span>
                Role
                   </span>
                </a>
                <a href="{{ route('permission.create') }}" class="">
                <span>
                Permission
                   </span>
                </a>
            </div>
        </div>

        <div class="profile-box">
        <div class="short-code">
            <form action="{{ route('assignrole.update',$user->id) }}" method="POST" class="">
            @csrf
                @method('PUT')
                <div class="form-group">
                                <label>  User Name</label>
                                <input type="text" placeholder="" name="name" id=""
                                class="form-control" value="{{ $user->name }}">
                                @error('name')
                            <label class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                            </div>
                            <div class="form-group">
                        <label>User Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="col-6">
                                <div class="form-group">
                                    <label> Assign Role</label>
                                    <select name="selectedrole" id="grid-state">
                                    <option value="">--Select Role--</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        @foreach ($user->roles as $item)
                                            {{ ($item->id === $role->id) ? 'selected' : '' }}
                                        @endforeach
                                    >
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                                </div>
                            </div>
                    <div class="btn btn-box">
                                <input type="submit" class="cstm-btn margin-top-15"> Update User</button>
                            </div>
                        </form>
                
   
@endsection
   

      