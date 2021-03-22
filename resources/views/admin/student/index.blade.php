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
                    <h3><span>All Students</span></h3>
                    <span class="c_session"><b>Current Session</b> {{$y_name}} </span>
                    <div class="user-drop-sec">
                        <ul>
                            <li>
                                <a href="javascript:void(0)">
                                    <i>
                                        <img src="{{url('/')}}/assets/image/username.svg" class="menu-show" alt="">
                                    </i>
                                    <span>Hemendra</span>
                                    <span class="drop-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10.831" height="6.197" viewBox="0 0 10.831 6.197">
                                            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.113,11.6,17.2,7.51a.773.773,0,1,0-1.094-1.091l-4.632,4.629a.771.771,0,0,0-.023,1.065L16.1,16.774a.774.774,0,1,0,1.1-1.09Z" transform="translate(-6.172 17.445) rotate(-90)" fill="#000" />
                                        </svg>
                                    </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ url('/logout') }}">
                                            <i>
                                                <img src="{{url('/')}}/assets/image/logout-01.svg" class="menu-show" alt="">
                                            </i>
                                            <span>Log Out</span>
                                        </a>
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
                        <!-- <ul class="cus-menu">
                        @php
                        $posts= App\Models\Student_classe::get();
                        $current_year=$y_id;
                        @endphp
                        @foreach($posts as $post)
                        <li @if(request()->segment(2) == $post->id) class="active" @endif ><a href="{{ url('classes',['classes'=>$post->id,'session'=>$current_year]) }}">{{$post->class_name}}</a></li>
                        @endforeach
                    </ul> -->
                        <select name="change" id="change">
                            @php
                            $posts= App\Models\Student_classe::get();
                            $current_year=$y_id;
                            @endphp
                            @foreach($posts as $post)
                            <option value="{{ $post->id }}" session="{{$current_year}}">{{$post->class_name}}</option>
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
                            <a href="javascript:void(0)" class="add-btn addStudent">Add Student</a>

                            <div class="modal fade" id="myaddModal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add <span> Student</span></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('students.store')}}" id="studentAdd" method="Post" enctype="multipart/form-data">
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
                                                            <input type="text" name="father_name" id="father_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Mother name</label>
                                                            <input type="text" name="mother_name" id="mother_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" name="address" id="address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Aadhar No.</label>
                                                            <input type="number" name="aadhar_no" id="aadhar_no">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Samagra Id</label>
                                                            <input type="number" name="samarg_id" id="samarg_id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date of Birth</label>
                                                            <input type="date" name="dob" id="dob">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Class</label>
                                                            <select name="class_name" id="class_name">
                                                                <option value="" selected>Select Class</option>
                                                                @foreach($tests as $test)
                                                                <option value="{{$test->id}}">{{$test->class_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Mobile No. 1</label>
                                                            <input type="number" name="mobile_no" id="mobile_no">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Mobile No. 2</label>
                                                            <input type="number" name="mobile_no2" id="mobile_no2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 last-input-margin" style="display: none;">
                                                        <div class="form-group">
                                                            <label>Current Session</label>
                                                            <select name="session" id="session">

                                                                <option value="{{$y_id}}" selected>{{$y_name }}
                                                                </option>

                                                            </select>
                                                            <input type="hidden" name="session" value="{{$y_id}}">
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

                                                        <input type="submit" name="save" class="add-btn" id="butsave" value="Add Student">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-table" id="dvData">
                    <table id="student-table" class="table tabel-res table-striped" style="width:100%;" data-plugin-options='{"searchPlaceholder": "Suchen"}'>
                        <thead>
                            <tr>
                                <th class="width-30">#</th>
                                <th class="width-200">Name</th>
                                <th style="display: none;">Father Name</th>
                                <th class="width-30">Id</th>
                                <th>Scholar No.</th>
                                <th>Address</th>
                                <th>Aadhar Number</th>
                                <th>Mob No.</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            @php $i = 0; @endphp
                            @foreach($records as $r)
                            @foreach($students as $student)
                            @if(($r->students_id==$student->id) &&($r->session==$y_id))
                            <tr>
                                <td class="width-30">@php echo ++$i @endphp</td>
                                <td class="width-200"><b>{{$student->name}}</b><br>
                                    <div class="user-dtls">
                                        <span><img src="{{url('/')}}/assets/image/men.svg" alt="">{{$student->father_name}}</span>
                                        <span><img src="{{url('/')}}/assets/image/women.svg" alt="">{{$student->mother_name}}</span>
                                    </div>
                                </td>
                                <td style="display: none;">{{$student->father_name}}
                                </td>
                                <td class="width-30">{{$student->student_id}}</td>
                                <td>{{$student->scholar_no}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->aadhar_no}}</td>
                                <td>{{$student->mobile_no}} <br>
                                    {{$student->mobile_no2}}
                                </td>
                                <td>
                                    <ul class="d-flex">
                                        <li class="tool tool-edit">
                                            <a class="studentpopup" id="" href="javascript:void(0)">view </a>
                                           

                                        </li>
                                        <li class="tool tool-edit">
                                            <a class="edit-btn" href="{{route('students.edit',$student->id)}}">
                                                <img src="{{url('/')}}/assets/image/feather-edit.svg" width="16px" alt=""></a>
                                            <span class="tooltips">Edit</span>
                                        </li>
                                        <li class="tool tool-view">
                                            <a class="view-btn" href="{{url('show',['student'=>$student->id,'session'=>$r->session])}}">
                                                <img src="{{url('/')}}/assets/image/feather-eye.svg" width="16px" alt=""></a>
                                            <span class="tooltips">Preview</span>
                                        </li>
                                        <li class="tool tool-delete">
                                            @if(Auth::check() && Auth::user()->user_type == "Admin")
                                            <a href="javascript:void(0)" type="submit" class="delete-btn deletestudent" data-id="{{$student->id}}" data-name="{{$r->id}}"><img src="{{url('/')}}/assets/image/feather-trash.svg" width="16px" alt=""></a>
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
                <!-- student delete modal -->
                <div id="studentDeleteModal" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="width:55%;">
                        <div class="modal-content">
                            <form action="{{url('studentdelete')}}" method="POST" class="remove-record-model">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title text-center" id="custom-width-modalLabel">Delete Applicant Record</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>You Want You Sure Delete This Record?</h4>
                                    <input type="hidden" , name="sid" id="s_id">
                                    <input type="hidden" , name="rid" id="r_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="mystudentModal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <a href="javascript:void(0)" type="submit" class="" data-id="" data-name=""></a>  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('additionalscripts')

@endsection