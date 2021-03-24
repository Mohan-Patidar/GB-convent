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
                    <h3><span>{{$class_name}}</span></h3>
                    <div class="user-drop-sec">
                    <span class="c_session"><b><img src="{{url('/')}}/assets/image/sess.svg" alt=""></b> {{$y_name}} </span>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i>
                                        <img src="{{url('/')}}/assets/image/username.svg" class="menu-show" alt="">
                                    </i><span>Hemendra</span>
                                    <span class="drop-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.831" height="6.197" viewBox="0 0 10.831 6.197">
                                            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.113,11.6,17.2,7.51a.773.773,0,1,0-1.094-1.091l-4.632,4.629a.771.771,0,0,0-.023,1.065L16.1,16.774a.774.774,0,1,0,1.1-1.09Z" transform="translate(-6.172 17.445) rotate(-90)" fill="#000" />
                                        </svg>
                                    </span></a>
                                <ul>
                                    <li>
                                        <a href="{{ url('/logout') }}">
                                            <i>
                                                <img src="{{url('/')}}/assets/image/logout-01.svg" class="menu-show" alt="">
                                            </i><span>Log Out</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-inr">
                <div class="tabel-head">
                    <div class="form-group">
                        <select name="change" id="changes">
                            @php
                            $posts= App\Models\Student_classe::get();
                            $current_year=$y_id;
                            @endphp
                            @foreach($posts as $post)
                            <option @if(request()->segment(2) == $post->id) selected @endif value="{{ $post->id }}" session="{{$current_year}}">{{$post->class_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="tabel-head-right">
                        <form action="{{ route('import') }}" method="Post" enctype="multipart/form-data" class="export-form">
                            @csrf
                            <input type="file" name="file" id="file" class="my-profile-choose-file">
                            <input type="submit" id="submit" style="display: none;">
                            <a href="#" class="import btn-data" role='button'>
                                <img src="{{url('/')}}/assets/image/export.svg" alt="">
                            </a>
                            <a href="#" id="export" class="btn-data" role='button'>
                                <img src="{{url('/')}}/assets/image/import.svg" alt="">
                            </a>
                        </form>
                        <div class="page-btn">
                            <a href="{{route('students.create')}}" class="add-btn">Add Student</a>
                        </div>
                    </div>
                </div>
                <form id="frm-example" action="javascript:void(0)" method="get">
                    <div class="page-table" id="dvData">
                        <table id="class-table" class="tabel-res checkbox-table table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <!-- <th class="width-30"></th> -->
                                    <th class="width-30">#</th>
                                    <th class="width-160">Name</th>
                                    <th class="width-50">Id</th>
                                    <th>Scholar No.</th>
                                    <th>Address</th>
                                    <th>Aadhar Number</th>
                                    <th>Mob No.</th>
                                    <th>Actions</th>
                                    <!-- <th>Bank Acc/No.</th> -->
                                    <!-- <th>Class</th> -->
                                    <!-- <th>D.O.B</th> -->
                                    <!-- <th style="display: none;">Profile</th> -->
                                    <!-- <th>Samagar Id</th> -->
                                </tr>
                            </thead>
                            <tbody id="result">
                                @php $i = 0; @endphp
                                @foreach($tests as $t)
                                @foreach($b as $student)
                                @if($t->students_id==$student->id)
                                <tr>
                                    <td class="width-30"></td>
                                    <!-- <td class="width-30">@php echo ++$i @endphp</td> -->
                                    <td class="width-160"><b>{{$student->name}}</b><br>
                                        <div class="user-dtls">
                                            <span><img src="{{url('/')}}/assets/image/men.svg" alt="">{{$student->father_name}}</span>
                                            <span><img src="{{url('/')}}/assets/image/women.svg" alt="">{{$student->mother_name}}</span>
                                        </div>
                                    </td>
                                    <td class="width-50">{{$student->student_id}}</td>
                                    <td>{{$student->scholar_no}}</td>
                                    <td>{{$student->address}}</td>
                                    <td>{{$student->aadhar_no}}</td>
                                    <td>{{$student->mobile_no}} <br>
                                        {{$student->mobile_no2}}
                                    </td>
                                    <td>
                                        <ul class="d-flex">
                                        <li class="tool tool-edit">
                                        <a class="edit-btn" href="{{route('students.edit',$student->id)}}">
                                                <img src="{{url('/')}}/assets/image/feather-edit.svg" width="16px" alt="">
                                            </a>
                                            <span class="tooltips">Edit</span>
                                        </li>
                                        <li class="tool tool-view">
                                        <a class="view-btn" href="{{url('show',['student'=>$student->id,'session'=>$t->session])}}">
                                                <img src="{{url('/')}}/assets/image/feather-eye.svg" width="16px" alt="">
                                            </a>
                                            <span class="tooltips">Preview</span>
                                        </li>
                                        <li class="tool tool-delete">
                                            @if(Auth::check() && Auth::user()->user_type == "Admin")
                                            <a href="javascript:void(0)" type="submit" class="delete-btn student-delete" data-id="{{$student->id}}" data-name="{{$t->id}}">
                                                <img src="{{url('/')}}/assets/image/feather-trash.svg" width="16px" alt="">
                                            </a>
                                            <span class="tooltips">Delete</span>
                                        </li>
                                        @endif
                                    </ul>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <p><button type="submit" data-toggle="modal" data-target="#promoteModal">Promote</button></p>
                    <div class="container">
                        <!-- The Modal -->
                        <div class="modal" id="promoteModal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center width-100">Student Promote</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.535" height="19.256" viewBox="0 0 18.535 19.256">
                                            <g id="Group_846" data-name="Group 846" transform="translate(-5587.733 110.989)">
                                                <line id="Line_31" data-name="Line 31" x2="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#ffc5a0" stroke-linecap="round" stroke-width="2.5" />
                                                <line id="Line_32" data-name="Line 32" x1="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#654fd3" stroke-linecap="round" stroke-width="2.5" />
                                            </g>
                                        </svg>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ url('promote') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="students_id" id="promote" value="">
                                            <div class="form-group">
                                            <select name="year" id="year">
                                                <option value="">Session</option>
                                                @foreach($year as $y)
                                                @if($y->status!=1)
                                                <option value="{{$y->id}}">{{$y->years}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <select name="class" id="class">
                                                <option value="">Class</option>
                                                @foreach($class as $c)
                                                <option value="{{$c->id}}">{{$c->class_name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="form-group">
                                            <input type="submit" value="Add" class="add-btn align-center">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
@section('additionalscripts')>
@endsection