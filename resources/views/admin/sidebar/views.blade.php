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
                    <h3><span>student </span></h3> <a href="#" class="btn btn-warning" id="export" role='button'>Export</a>
                    <span class="c_session"><b>Current Session</b> {{$y_name}} </span>
                    <div class="user-drop-sec">
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
            <div class="tabel-head">
                <h5 class="page-title"><span>Classes </span></h5>
                <div class="form-group">
                    <ul class="cus-menu">
                        @php
                        $posts= App\Models\Student_classe::get();
                        $y_id=request()->segment(2);
                        @endphp
                        @foreach($posts as $post)
                        <li @if(request()->segment(2) == $post->id && request()->segment(1)=='classes') class="active" @endif ><a href="{{ url('classes',['classes'=>$post->id,'session'=>$y_id]) }}">{{$post->class_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="tabel-head-right">
                <form action="{{ route('import') }}" method="Post" enctype="multipart/form-data" class="export-form">
                        @csrf
                        <input type="file" name="file" id="file" class="my-profile-choose-file">
                        <input type="submit" id="submit" style="display: none;">
                        <button type="button" class="btn btn-success import">Import</button>
                        <a href="#" class="btn btn-warning" id="export" role='button'>Export</a>
                    </form>
                </div>
                <div class="page-btn">
                    <a href="{{route('students.create')}}" class="add-btn">Add Student</a>
                </div>
            </div>
            <div class="page-table" id="dvData">
                <table id="student-table" class="table tabel-res table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Actions</th>
                            <th>Student Id</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Scholar No.</th>
                            <th>Class</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>D.O.B</th>
                            <th>Address</th>
                            <th>Aadhar Number</th>
                            <th>Samagar Id</th>
                            <th>Mobile No. 1</th>
                            <th>Mobile No. 2</th>
                            <th>Bank Acc/No.</th>
                            <th>Session</th>
                        </tr>
                    </thead>
                    <tbody id="result">
                        @php $i = 0; @endphp
                        @foreach($tests as $t)
                        @foreach($b as $student)
                        @if(($t->students_id==$student->id))
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            <td>
                                <div class="d-flex">
                                    <a class="edit-btn" href="{{route('students.edit',$student->id)}}">
                                        <img src="{{url('/')}}/assets/image/feather-edit.svg" width="16px" alt=""></a>
                                    <a class="edit-btn" href="{{url('show',['student'=>$student->id,'session'=>$t->session])}}">
                                        <img src="{{url('/')}}/assets/image/feather-eye.svg" width="16px" alt=""></a>
                                    @if(Auth::check() && Auth::user()->user_type == "Admin")
                                    <button type="submit" class="delete-btn student-delete" data-id="{{$student->id}}" data-name="{{$t->id}}">
                                        <img src="{{url('/')}}/assets/image/feather-trash.svg" width="16px" alt="">
                                    </button>
                                    @endif
                                </div>
                            </td>
                            <td>{{$student->student_id}}</td>
                            <td>@if($student->profile_picture==NULL)<img class="student-img" src="{{url('/')}}/assets/image/download.png" />
                                @else<img class="student-img" src="{{asset('image/profile_picture/' .$student->profile_picture) }}" />@endif</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->scholar_no}}</td>
                            @foreach($class as $c)
                            @if($c->id == $t->class_name)
                            <td class="sorting_1">{{$c->class_name}}</td>
                            @endif
                            @endforeach
                            <td>{{$student->father_name}}</td>
                            <td>{{$student->mother_name}}</td>
                            <td>{{$student->dob}}</td>
                            <td>{{$student->address}}</td>
                            <td>{{$student->aadhar_no}}</td>
                            <td>{{$student->samarg_id}}</td>
                            <td>{{$student->mobile_no}}</td>
                            <td>{{$student->mobile_no2}}</td>
                            <td>{{$student->account_no}}</td>
                            @foreach($year as $y)
                            @if($y->id == $t->session)
                            <td class="sorting_1">{{$y->years}}</td>
                            @endif
                            @endforeach
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
@section('additionalscripts')>
@endsection