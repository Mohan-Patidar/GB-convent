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
                    <span>student </span>
                </div>
                <div class="page-btn">
                    <a href="{{route('students.create')}}" class="add-btn">Add Student</a>
                </div>
            </div>
                <div class="page-table" id="dvData">
                    <table id="student-table" class="table table-bordered table-striped" style="width:100%;">
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
                        @foreach($students as $student)
                            <tr>
                            
                                <td>@php echo ++$i @endphp</td>
                                <td>
                                    <div class="d-flex">
                                    <button class="">
                                        <a 
                                            href="{{route('students.show',$student->id)}}">
                                            <img src="{{url('/')}}/assets/image/view.svg" width="16px" alt=""></a>
                                        </button>
                                        <button class="edit-btn">
                                        <a
                                            href="{{route('students.edit',$student->id)}}">
                                            <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                        </button>
                                        @if(Auth::check() && Auth::user()->user_type  == "Admin")
                                        <button type="submit" class="delete-btn student-delete" data-id="{{$student->id}}" data-name="{{ $student->name }}" > 
                                            <img src="{{url('/')}}/assets/image/Icon-delete.svg" width="16px" alt="">
                                        </button>
                                        @endif
                                    </div>
                                </td>
                                <td>{{$student->student_id}}</td>
                                <td><img class="student-img"  src="{{asset('image/profile_picture/' .$student->profile_picture) }}" /></td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->scholar_no}}</td>
                                @foreach($tests as $test)
                                    @if($test->id == $student->gbs_id)
                                        <td class="sorting_1">{{$test->class_name}}</td>
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
                                <td>{{$student->add_session}}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection
    @section('additionalscripts')>

    @endsection