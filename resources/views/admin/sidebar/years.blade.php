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
                    <h3><span>student </span></h3>
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
                    <p>
                        <select id="table-filter">
                        <option value="">All</option>
                        <option>Nursery</option>
                        <option>First</option>
                        <option>Second</option>
                        <option>Third</option>
                        <option>Fourth</option>
                        <option>Fifth</option>
                        <option>Sixth</option>
                        <option>Seventh</option>
                        <option>Eigth</option>
                        <option>Ninth</option>
                        <option>Tenth</option>
                        </select>
                        </p>
                       
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
                        </div>
                    </div>
                   
                </div>
                <div class="page-table" id="dvData">
                    <table id="" class="studenttable tabel-res table-striped" style="width:100%;">
                    <thead>
                            <tr>
                                <th class="width-30">#</th>
                                <th class="width-160">Name</th>
                                <th style="display: none;">Father Name</th>
                                <th style="display: none;">Class</th>
                                <th class="width-50">Id</th>
                                <th>Scholar No.</th>
                                <th>Address</th>
                                <th>Aadhar Number</th>
                                <th>Mob No.</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="result">
                            @php $i = 0; @endphp
                            @foreach($tests as $t)
                            @foreach($b as $student)
                            @if($t->students_id==$student->id)
                            <tr>
                                <td class="width-30">{{$student->id}}</td>
                                <td class="width-160"><b>{{$student->name}}</b><br>
                                    <div class="user-dtls">
                                        <span><img src="{{url('/')}}/assets/image/men.svg" alt="">{{$student->father_name}}</span>
                                        <span><img src="{{url('/')}}/assets/image/women.svg" alt="">{{$student->mother_name}}</span>
                                    </div>
                                </td>
                                <td style="display: none;">{{$student->father_name}}
                                </td>
                              
                                @foreach($allclass as $c)
                                @if($c->id == $t->class_name)
                                <td style="display: none;">{{$c->class_name}}
                                </td>
                                @endif
                                @endforeach
                                <td class="width-50">{{$student->student_id}}</td>
                                <td>{{$student->scholar_no}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->aadhar_no}}</td>
                             
                                <td>{{$student->mobile_no}}<br>
                                    {{$student->mobile_no2}}
                                </td>
                             
                            <td>
                                    <ul class="d-flex">
                                        <li class="tool tool-view">
                                            <a class="studentpopup" data-id="{{$student->id}}" data-href="{{route('students.edit',$student->id)}}" fees-href="{{url('show',['student'=>$student->id,'session'=>$t->session])}}">  <img src="{{url('/')}}/assets/image/feather-eye.svg" width="16px" alt=""> </a>
                                            <span class="tooltips">Preview</span>
                                        </li>

                                        <li class="tool tool-delete">
                                            @if(Auth::check() && Auth::user()->user_type == "Admin")
                                            <a href="javascript:void(0)" type="submit" class="delete-btn deletestudent" data-id="{{$student->id}}" data-name="{{$t->id}}"><img src="{{url('/')}}/assets/image/feather-trash.svg" width="16px" alt=""></a>
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
                    <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                        <div class="modal-content">
                            <form action="{{url('studentdelete')}}" method="POST" class="remove-record-model">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="modal-header">
                                    <h5 class="modal-title text-center width-100" id="custom-width-modalLabel">Delete Student</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.535" height="19.256" viewBox="0 0 18.535 19.256">
                                            <g id="Group_846" data-name="Group 846" transform="translate(-5587.733 110.989)">
                                                <line id="Line_31" data-name="Line 31" x2="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#ffc5a0" stroke-linecap="round" stroke-width="2.5" />
                                                <line id="Line_32" data-name="Line 32" x1="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#654fd3" stroke-linecap="round" stroke-width="2.5" />
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="">Are you sure you want to delete this record?</h6>
                                    <input type="hidden" , name="sid" id="s_id">
                                    <input type="hidden" , name="rid" id="r_id">
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="add-btn waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="delete-data-btn waves-effect remove-data-from-delete-form">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- student edit modal -->
                <div class="modal right fade" id="mystudentModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content student-modal-content">
                            <div class="modal-header">
                                <ul>
                                    <li class="active">
                                        <a href="#tabs-1" data-toggle="tab" role="tab">Edit Student</a>
                                    </li>
                                    <li>
                                        <a href="#tabs-2" data-toggle="tab" id="fees-details"   role="tab"> Student Fees Details</a>
                                    </li>
                                </ul>
                                <button type="button" class="close" data-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.535" height="19.256" viewBox="0 0 18.535 19.256">
                                        <g id="Group_846" data-name="Group 846" transform="translate(-5587.733 110.989)">
                                            <line id="Line_31" data-name="Line 31" x2="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#ffc5a0" stroke-linecap="round" stroke-width="2.5" />
                                            <line id="Line_32" data-name="Line 32" x1="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#654fd3" stroke-linecap="round" stroke-width="2.5" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body after-design">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <form method="Post" action="{{url('editstudent')}}" enctype="multipart/form-data" id="edit-student">
                                            <input type="hidden" name="sId" id="sIds" value="">
                                            @csrf
                                            <div class="min-height">
                                                <div class="row ">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="student_id" id="student_ids"  value="" placeholder="Student Id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="scholar_no" id="scholar_nos" value="" placeholder="Scholar No.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="name" id="names" value="" placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="father_name" id="fname" value="" placeholder="Father name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="mother_name" id="mname" value="" placeholder="Mother name">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input type="text" name="address" id="addres" value="" placeholder="Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input type="number" name="aadhar_no" id="aadhar" value="" placeholder="Aadhar No.">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input type="number" name="samarg_id" id="samargid" value="" placeholder="Samagra Id">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group birth-date">
                                                            <input type="text" name="dob" id="sdob" value="" placeholder="DOB">
                                                            <span class="input-group-btn" for="dob">
                                                                <img src="http://localhost/GB-convent/assets/image/feather-calendar.svg">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select name="class_name" id="classes">
                                                                <option>Class</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input type="number" name="mobile_no" id="m1" value="" placeholder="Mobile No.">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input type="number" name="mobile_no2" id="m2" value="" placeholder="Telephone No.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 last-input-margin">
                                                        <div class="form-group">
                                                            <select name="session" id="sessions">
                                                                <option>Current Session</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 last-input-margin">
                                                        <div class="form-group">
                                                            <input type="number" name="account_no" id="acc" value="" placeholder="Bank Account No.">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 last-input-margin">
                                                        <div class="form-group picture-grp">
                                                            <label for="file" class="pic-label">Upload Student Photo</label>
                                                            <input type="file" name="profile_picture" id="profile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <input type="submit" name="save" class="add-btn align-center" id="save" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="min-height">
                                            <div class="detail-head">
                                                <div class="detail-head-inr">
                                                    <div class="head-left">
                                                        <div class="stuedent-img"  id="profile_pic">
                                                            
                                                        </div>
                                                        <div class="student-name">
                                                            <h5 class="s_name"></h5>
                                                            <div class="stu-detail">
                                                                <div class="user-dtls">
                                                                    <span class="f_name"><img src="{{url('/')}}/assets/image/men.svg" alt=""></span>
                                                                    <span class="m_name"> <img src="{{url('/')}}/assets/image/women.svg" alt=""></span>
                                                                </div>
                                                            </div>
                                                            <div class="stu-id">
                                                                <p>Student ID: <span class="student_ids"></span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="head-right">
                                                        <div class="">
                                                            <span>
                                                                <span class="address">
                                                                    <img src="{{url('/')}}/assets/image/location.svg" alt=""> Gadwada
                                                                </span>
                                                            </span>
                                                            <br>
                                                            <span>
                                                                <span class="contact">
                                                                    <img src="{{url('/')}}/assets/image/call.svg" alt=""> 454545454
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <div class="scholar-no">
                                                            <p>Scholar N: <span class="scholar"></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fee-sec">
                                                <div class="fee-left">
                                                    <h6>Total Fees: <span class="total-fee amounts"><label>₹</label></span></h6>
                                                </div>
                                                <div class="fee-right">
                                                    <h6>Due Fees: <span class="due-fee remaining"><label>₹</label></span></h6>
                                                </div>
                                            </div>
                                            <div class="fee-list-head">
                                                <h6>Fees Summery</h6>
                                                <a href="javascript:void(0)" class="add-btn deposit-modal">Deposit Fee</a>
                                            </div>
                                            <div class="fee-list-table">
                                                <table >
                                                    <thead>
                                                        <tr>
                                                            <th>Rec No.</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="student-fees">
                                                    <tr>
                                                            <td>
                                                                0021
                                                            </td>
                                                            <td>₹1300</td>
                                                            <td>21 Mar 2021</td>
                                                            <td>
                                                                Father
                                                            </td>
                                                            <td>
                                                                <ul class="d-flex">
                                                                    <li class="tool tool-edit">
                                                                        <a class="edit-btn" href="javascript:void(0)">
                                                                            <img src="http://localhost/GB-convent/assets/image/feather-edit.svg" width="16px" alt=""></a>
                                                                        <span class="tooltips">Edit</span>
                                                                    </li>
                                                                    <li class="tool tool-delete">
                                                                        <a href="javascript:void(0)" type="submit" class="delete-btn">
                                                                            <img src="http://localhost/GB-convent/assets/image/feather-trash.svg" width="16px" alt="">
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                0021
                                                            </td>
                                                            <td>₹1300</td>
                                                            <td>21 Mar 2021</td>
                                                            <td>
                                                                Father
                                                            </td>
                                                            <td>
                                                                <ul class="d-flex">
                                                                    <li class="tool tool-edit">
                                                                        <a class="edit-btn" href="javascript:void(0)">
                                                                            <img src="http://localhost/GB-convent/assets/image/feather-edit.svg" width="16px" alt=""></a>
                                                                        <span class="tooltips">Edit</span>
                                                                    </li>
                                                                    <li class="tool tool-delete">
                                                                        <a href="javascript:void(0)" type="submit" class="delete-btn">
                                                                            <img src="http://localhost/GB-convent/assets/image/feather-trash.svg" width="16px" alt="">
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="modal right fade" id="myaddModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content student-modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <ul>
                                    <li class="active">
                                        <a href="JavaScript:Void(0);" >Add <span> Student</span></a>
                                    </li>
                                </ul>
                                <button type="button" class="close" data-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.535" height="19.256" viewBox="0 0 18.535 19.256">
                                        <g id="Group_846" data-name="Group 846" transform="translate(-5587.733 110.989)">
                                            <line id="Line_31" data-name="Line 31" x2="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#ffc5a0" stroke-linecap="round" stroke-width="2.5" />
                                            <line id="Line_32" data-name="Line 32" x1="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#654fd3" stroke-linecap="round" stroke-width="2.5" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body after-design">
                                <form action="{{route('students.store')}}" id="studentAdd" method="Post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="min-height">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="student_id" id="student_id" placeholder="Student Id">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="scholar_no" id="scholar_no" placeholder="Scholar No.">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="father_name" id="father_name" placeholder="Father name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="mother_name" id="mother_name" placeholder="Mother name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="address" id="address" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" name="aadhar_no" id="aadhar_no" placeholder="Aadhar No.">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" name="samarg_id" id="samarg_id" placeholder="Samagra Id">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group birth-date">
                                                    <input type="text" name="dob" id="dob" value="" placeholder="DOB">
                                                    <span class="input-group-btn" for="dob">
                                                        <img src="http://localhost/GB-convent/assets/image/feather-calendar.svg">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="class_name" id="class_name">
                                                        <option value="" selected>Select Class</option>
                                                        @foreach($allclass as $test)
                                                        <option value="{{$test->id}}">{{$test->class_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" name="mobile_no" id="mobile_no" placeholder="Mobile No.">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="number" name="mobile_no2" id="mobile_no2" placeholder="Telephone No.">
                                                </div>
                                            </div>
                                            <div class="col-md-6 last-input-margin" style="display: none;">
                                                <div class="form-group">
                                                    <select name="session" id="session">
                                                        <option value="">Current Session</option>
                                                        <option value="{{$y_id}}" selected>{{$y_name }}
                                                        </option>
                                                    </select>
                                                    <input type="hidden" name="session" value="{{$y_id}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 last-input-margin">
                                                <div class="form-group">
                                                    <input type="number" name="account_no" id="account_no" placeholder="Bank Account No.">
                                                </div>
                                            </div>
                                            <div class="col-12 last-input-margin">
                                                <div class="form-group picture-grp">
                                                    <label for="file" class="pic-label">Upload Student Photo</label>
                                                    <input type="file" name="profile_picture" id="profile_picture">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <input type="submit" name="save" class="add-btn align-center" id="butsave" value="Add Student">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                  <!-- Fees Deposit modal -->
                  <div class="modal right fade" id="feeDepositModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content student-modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <ul>
                                    <li class="active">
                                        <a href="JavaScript:Void(0);">Deposit Fee</a>
                                    </li>
                                </ul>
                                <button type="button" class="close" data-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.535" height="19.256" viewBox="0 0 18.535 19.256">
                                        <g id="Group_846" data-name="Group 846" transform="translate(-5587.733 110.989)">
                                            <line id="Line_31" data-name="Line 31" x2="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#ffc5a0" stroke-linecap="round" stroke-width="2.5" />
                                            <line id="Line_32" data-name="Line 32" x1="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#654fd3" stroke-linecap="round" stroke-width="2.5" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body after-design">
                                <div class="min-height">
                                    <div class="fee-sec">
                                        <div class="fee-left">
                                            <h6>Total Fees: <span class="total-fee amounts"><label>₹</label></span></h6>
                                        </div>
                                        <div class="fee-right">
                                            <h6>Due Fees: <span class="due-fee remaining"><label>₹</label></span></h6>
                                        </div>
                                    </div>
                                    <div class="deposit-form">
                                    <p id="msg"></p>
                                        <form action="JavaScript:Void(0)" id="add-fees" method="post">
                                        @csrf
                                            <input type="hidden" name="id" id="record_id" value="">
                                            <input type="hidden" name="amount" id="total_amount" value="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="receipt_no" placeholder="Receipt No.">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="fees" placeholder="Amount">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group birth-date">
                                                        <input type="text" name="date" value="" placeholder="Date">
                                                        <span class="input-group-btn" for="date">
                                                            <img src="http://localhost/GB-convent/assets/image/feather-calendar.svg">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="description" placeholder="Received From">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                    <input type="submit" name="save" class="add-btn align-center" id="but-save" value="Add Fee">
                                </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- edit fees modal -->
                <div class="modal right fade" id="feeEditModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content student-modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"></h4>
                                <ul>
                                    <li class="active">
                                        <a href="JavaScript:Void(0);">Edit Fee</a>
                                    </li>
                                </ul>
                                <button type="button" class="close" data-dismiss="modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.535" height="19.256" viewBox="0 0 18.535 19.256">
                                        <g id="Group_846" data-name="Group 846" transform="translate(-5587.733 110.989)">
                                            <line id="Line_31" data-name="Line 31" x2="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#ffc5a0" stroke-linecap="round" stroke-width="2.5" />
                                            <line id="Line_32" data-name="Line 32" x1="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#654fd3" stroke-linecap="round" stroke-width="2.5" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body after-design">
                                <div class="min-height">
                                    <div class="fee-sec">
                                        <div class="fee-left">
                                            <h6>Total Fees: <span class="total-fee amounts"><label>₹</label></span></h6>
                                        </div>
                                        <div class="fee-right">
                                            <h6>Due Fees: <span class="due-fee remaining"><label>₹</label></span></h6>
                                        </div>
                                    </div>
                                    <div class="deposit-form">
                                    <p id="msg"></p>
                                        <form action="JavaScript:Void(0)" id="edit-fees" method="post">
                                        @csrf
                                                <input type="hidden" name="main_id" id="main_id" value="">
                                                <input type="hidden" name="id" id="idkl" value="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="receipt_no" id="receipt" placeholder="Receipt No.">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="fees" id="fee" placeholder="Amount">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group birth-date">
                                                        <input type="text" name="date" id="dates" value="" placeholder="Date">
                                                        <span class="input-group-btn" for="date">
                                                            <img src="http://localhost/GB-convent/assets/image/feather-calendar.svg">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="description" id="descriptions" placeholder="Received From">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                    <input type="submit" name="save" class="add-btn align-center" id="but-edit" value="Add Fee">
                                </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('additionalscripts')>
@endsection