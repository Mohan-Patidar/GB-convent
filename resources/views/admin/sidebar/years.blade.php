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

            <a  href="#" class="btn btn-warning" id="export" role='button'>Export</a>
     
        <div class="page-btn">
            <a href="{{route('students.create')}}" class="add-btn">Add Student</a>
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
            <li @if(request()->segment(2) == $post->id) class="active" @endif ><a href="{{ url('classes',['classes'=>$post->id,'session'=>$y_id]) }}"  >{{$post->class_name}}</a></li>
                    @endforeach
            </ul>
           
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
                            
                        </tr>
                    </thead>
                    <tbody id="result">
                        @php $i = 0; @endphp
                        @foreach($tests as $t)
                        @foreach($b as $student)
                    
                        @if($t->students_id==$student->id)
                   
                        <tr>

                            <td>@php echo ++$i @endphp</td>
                            <td>
                                <div class="d-flex">
                                    <button class="edit-btn">
                                        <a class="" href="{{route('students.edit',$student->id)}}">
                                            <img src="{{url('/')}}/assets/image/Icon-edit.svg" width="16px" alt=""></a>
                                    </button>
                                    <button class="edit-btn">
                                        <a class="" href="{{route('students.show',$student->id)}}">
                                            <img src="{{url('/')}}/assets/image/view.svg" width="16px" alt=""></a>
                                    </button>
                                    @if(Auth::check() && Auth::user()->user_type  == "Admin")
                                    <form action="{{route('students.destroy', ['student' => $student->id])}}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="delete-btn student-delete">
                                            <img src="{{url('/')}}/assets/image/Icon-delete.svg" width="16px" alt="">
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                            <td>{{$student->student_id}}</td>
                            <td><img class="student-img" src="{{asset('image/profile_picture/' .$student->profile_picture) }}" /></td>
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
                            
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection
    @section('additionalscripts')>

    @endsection