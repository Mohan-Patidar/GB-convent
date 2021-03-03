@extends('layouts.adminlayout')

@section('content')


@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span></button>
    <p>{{ Session::get('message') }}</p>
</div>
@endif
        <section class="main-wrapper">
            <div class="page-color">
                <div class="page-header">
                    <div class="page-title">
                        Add Student <span>class</span>
                    </div>
                    <div class="page-btn">
                        <a href="{{url('/add_class')}}" class="add-btn">
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
                        <form id="class-form" method="Post" action="{{route('add_class.store')}}"
                        enctype="multipart/form-data" >
                        @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" placeholder="Student Class" name="class_name" id="class_name">
                                @error('name')
                            <label class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                            </div>
                           
                            <div class="btn btn-box">
                                <button type="submit" class="add-btn margin-top-15">Add Class</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
@section('additionalscripts')
<script>
    $("#class-form").validate();
   
</script>
@endsection