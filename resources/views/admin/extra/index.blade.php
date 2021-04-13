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
                    Extra
                </div>

                <div class="page-btn">
                    <a href="javascript:void(0)" class="add-btn addstudent">Add Student</a>

                    <div class="modal right fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.535" height="19.256" viewBox="0 0 18.535 19.256">
                                            <g id="Group_846" data-name="Group 846" transform="translate(-5587.733 110.989)">
                                                <line id="Line_31" data-name="Line 31" x2="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#ffc5a0" stroke-linecap="round" stroke-width="2.5" />
                                                <line id="Line_32" data-name="Line 32" x1="15" y2="15.721" transform="translate(5589.5 -109.221)" fill="none" stroke="#654fd3" stroke-linecap="round" stroke-width="2.5" />
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <p class="msg"></p>
                                <div class="modal-body">
                                    <form class="add-student-form" id="extrapays" method="Post" action="">

                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" id="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Father name</label>
                                                    <input type="text" name="father_name" id="father">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mother name</label>
                                                    <input type="text" name="mother_name" id="mother">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Class</label>
                                                    <select name="class_name" id="class_names">
                                                        <option value="" selected>Select Class</option>
                                                        @foreach($class as $test)
                                                        <option value="{{$test->id}}">{{$test->class_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary addfees" data-dismiss="modal">Add</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabel-head">
                <h5 class="page-title"><span>Student </span></h5>
            </div>
            <div class="page-table">
                <table class="table table-striped custom-table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Class</th>
                            <th>View more</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach($students as $s)
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            <td>{{$s->name}}</td>
                            <td>{{$s->fname}}</td>
                            <td>{{$s->mname}}</td>
                            @foreach($class as $c)
                            @if($c->id==$s->class)
                            <td>{{$c->class_name}}</td>
                            @endif
                            @endforeach
                            @php

                            $gave = App\Models\Payment::where("id", "=", $s->id)->sum('price');


                            @endphp
                            <td>

                                <ul class="d-flex">
                                    <li class="tool tool-view">
                                        <a class="showdetails" data-id="{{$s->id}}" data-name="{{$s->price}}"> <img src="{{url('/')}}/assets/image/feather-eye.svg" width="16px" alt=""> </a>

                                    </li>
                                </ul>
                                <!-- <a href="javascript:void(0)" class="showdetails" data-id="{{$s->id}}" >
                                 view more
                                </a>
                            <a href="javascript:void(0)" class="addpayment" data-id="{{$s->id}}" data-name={{$gave}}>
                                  Gave
                                </a>
                                <a href="javascript:void(0)" class="subpayment" data-id="{{$s->id}}" data-name={{$gave}}>
                                 Take
                                </a> -->

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal right fade" id="showdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
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
                            <div class="student-name">
                                <label>Student name:</label>
                                <span class="s_name"></span>

                                <div class="stu-detail">
                                    <div class="user-dtls">
                                        <label>Father's name:</label>
                                        <span class="f_name"></span></br>
                                        <label>Mother's name:</label>
                                        <span class="m_name"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="fee-sec">
                                <div class="fee-left">
                                    <h6>Gave Amount: <span class="total-fee gave"><label>₹</label></span></h6>
                                </div>
                                <div class="fee-right">
                                    <h6>Due Amount: <span class="due-fee take"><label>₹</label></span></h6>
                                </div>
                            </div>
                            <input type="hidden" name="old" id="old_pric">
                            <input type="hidden" name="id" id="s_id">
                            <div class="fee-list-head">
                               
                                <a href="javascript:void(0)" class="add-btn addpayment"  >Gave</a>
                                <a href="javascript:void(0)" class="add-btn subpayment"  >Take</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal right fade" id="gavepayment" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content student-modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <ul>
                            <li class="active">
                                <a href="JavaScript:void(0);">Gave Payment</a>
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
                    <p class="message"></p>
                        <form class="add-student-form" id="gave" method="Post" önSubmit="return" action="javascript:void(0)">
                            @csrf
                            <input type="hidden" name="old" id="old_price" value="">
                            <input type="hidden" name="sid" id="id" value="">

                           
                            <input type="number" name="price" id="prices" autocomplete="off" placeholder="Amount">

                           
                            <input type="date" name="date" id="dates" placeholder="When did you got?">

                           
                            <input type="text" name="detail" id="details" placeholder="Enter Details">


                            <button type="submit" class="btn btn-secondary addpay">Gave</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="modal right fade" id="subpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Take Payment</h5>
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

                            <div class="row">
                            <p class="message"></p>
                                <form class="add-student-form" id="takeamount" method="Post" önSubmit="return" action="javascript:void(0)">
                                    @csrf
                                    <input type="hidden" name="old" id="oldprice" value="">
                                    <input type="hidden" name="sid" id="ids" value="">
                                        
                                          
                                            <input type="number" name="price" id="tprices" autocomplete="off" placeholder="Amount">
            
                                            <input type="date" name="date" id="tdates" placeholder="When did you got?">
               
                                            <input type="text" name="detail" id="tdetails" placeholder="Enter Details">
                                         

                                        <button type="submit" class="btn btn-secondary subpay" >Take</button>
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
</div>
</div>

</div>
</section>
</div>
@endsection
@section('additionalscripts')
<script></script>
@endsection