@extends('layouts.adminlayout')

@section('content')
<div class="page-inner ad-inr">
    @if(Session::has('message'))
    <div class="save-alert alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span></button>
        <p>{{ Session::get('message') }}</p>
    </div>
    @endif
<section class="main-wrapper">
            <div class="page-color">
                <div class="page-header">
                    <div class="page-title">
                        student <span> class</span>
                    </div>
                    <div class="page-btn">
                        <a href="{{route('add_class.create')}}" class="add-btn">Add Student Class</a>
                    </div>
                </div>
                <div class="page-table">
                    <table id="example" class="table-striped table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                 <th>S.No.</th>
                                <th>Class Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php $i = 0; @endphp
                        @foreach($tests as $test)
                            <tr>
                                 <td>@php echo ++$i @endphp</td>
                                <td>{{$test->class_name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="edit-btn">
                                        <a class=""
                                            href="{{route('add_class.edit',$test->id)}}">
                                            <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                        </button>
                                 
                                        <button type="submit" class="delete-btn delete-confirm" data-id="{{$test->id}}" data-name="{{ $test->class_name }}"> 
                                            <img src="{{url('/')}}/assets/image/Icon-delete.svg" width="16px" alt="">
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
@endsection
@section('additionalscripts')

@endsection