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
                    <h3>student <span> class</span></h3>
                   
                    <a href="javascript:void(0)" class="add-btn addFees">Add Fees Structure</a>
                    <div class="modal fade" id="myfeesModal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    
                                    <h4 class="modal-title">Add Fess</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="class-form" method="Post" action="{{route('feesstructure.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 last-input-margin">
                                                <div class="form-group">
                                                    <label>Add Session</label>
                                                    <select name="years_id" id="years_id">
                                                        <option value="" selected>Select Session</option>
                                                        @foreach($years as $y)
                                                        <option value="{{$y->id}}">{{$y->years}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select name="student_classes_id" id="student_classes_id">
                                                        <option value="" selected>Select Class</option>
                                                        @foreach($classes as $test)
                                                        <option value="{{$test->id}}">{{$test->class_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Fees Structure</label>
                                                    <input type="text" placeholder="Fees Structure" name="amount" id="amount">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div class="btn btn-box">
                                                    <button type="submit" class="add-btn margin-top-15">Add Class</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabel-head">
                <h5 class="page-title"><span>Session </span></h5>
                <div class="form-group">
               
                  
                    <ul class="cus-menu">
                        @php
                        $posts= App\Models\Year::orderBy('id','DESC')->get();
                        @endphp
                        @foreach($posts as $post)
                        <li class="active"><a href="{{ url('fees',$post->id) }}">{{$post->years}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="page-table">
                <table id="example" class="table table-striped custom-table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            
                            <th>Class Name</th>
                            <th>Fees Structure</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($tests as $test)
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            
                            @foreach($class as $c)
                            @if($test->student_classes_id == $c->id)
                            <td>{{$c->class_name}}</td>
                            @endif
                            @endforeach
                            <td>{{$test->amount}}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="edit-btn editfees" data-href="{{ route('feesstructure.edit',$test->id) }}" data-id="{{$test->id}}" y-id="{{$y->id}}" fee-amount="{{$test->amount}}">
                                        <img src="{{url('/')}}/assets/image/feather-edit.svg" width="16px" alt=""></a>

                                    @if(Auth::check() && Auth::user()->user_type == "Admin")
                                    <a href="javascript:void(0)" type="submit" class="delete-btn deleteUser" data-id="{{$test->id}}"><img src="{{url('/')}}/assets/image/feather-trash.svg" width="16px" alt=""></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- fees delete modal -->
            <div id="feesDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog" style="width:55%;">
                    <div class="modal-content">
                        <form action="{{url('feesdelete')}}" method="POST" class="remove-record-model">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title text-center" id="custom-width-modalLabel">Delete Applicant Record</h4>
                            </div>
                            <div class="modal-body">
                                <h4>You Want You Sure Delete This Record?</h4>
                                <input type="hidden" , name="fees_id" id="app_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- fees edit modal -->
            <div class="modal fade" id="myEfeesModal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                   
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Fees</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form  method="Post" action="{{url('editfees')}}">
                              
                                @csrf
                                <input type="hidden" name="main_id" id="main_id" value="">
                                <input type="hidden" name="class_id" id="class_id" value="">
                                <input type="hidden" name="year_id" id="year_id" value="">
                                <div class="col-md-6 last-input-margin">
                                    <div class="form-group" style="display: none;">
                                        <label>Current Session</label>
                                        <select name="years_id" id="year_ids">
                                        </select>
                                       

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select name="student_classes_id" id="student_classes_ids">
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fees</label>
                                        <input type="text"  name="amount" id="amounts"  value="">
                                    </div>
                                </div>
                                <div class="btn btn-box">
                                    <button type="submit" class="cstm-btn margin-top-15">update Fees</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
@section('additionalscripts')
<script></script>
@endsection