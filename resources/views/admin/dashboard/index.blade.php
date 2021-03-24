@extends('layouts.adminlayout')
@section('content')
<section class="main-wrapper">
    <div class="page-color">
        <div class="page-header">
            <div class="page-title">
                <h3>Hi, <span>Hemendra</span> <span class="hello-icon"><img src="{{url('/')}}/assets/image/hello-icon.svg" alt=""></span></h3>
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
        <div class="dashboard-wrapper">
            <div class="dash-wrap-left">
                <div class="dash-wrap-left-inr">
                    <div class="dash-box-wraper">
                        <div class="dash-box dash-box-first">
                            <p>Total Students</p>
                            <h2>{{$student}}</h2>
                        </div>
                        <div class="dash-box dash-box-second">
                            <p>Current Session</p>
                            <h2>{{$year}}</h2>
                        </div>
                        <div class="dash-box dash-box-third">
                            <p>Weekly Collection</p>
                            <h2 id="total">{{$total}}</h2>
                        </div>
                    </div>
                    <div class="recent-fees-sec">
                        <div class="recent-head">
                            <div class="date-select">
                                <div class="input-daterange input-group" id="datepicker">
                                    <form action="javascript:void(0)" id="date-form">
                                    @csrf
                                        <div class="input-group">
                                            <input type="text" id="starts" class="input-sm" name="start" placeholder="From" autocomplete="off"/>
                                            <span class="input-group-btn" for="start">
                                                <img src="{{url('/')}}/assets/image/feather-calendar.svg">
                                            </span>
                                        </div>
                                        <div class="input-group sec-inp-group">
                                            <!-- <span class="input-group-addon">to</span> -->
                                            <input type="text" class="input-sm" name="end" id="ends" placeholder="To" />
                                            <span class="input-group-btn" for="start">
                                                <img src="{{url('/')}}/assets/image/feather-calendar.svg">
                                            </span>
                                        </div>
                                        <button class="filter-btn earning" type="submit">Filter</button>
                                    </form>
                                </div>
                            </div>
                            <a href="" class="add-btn">Fees
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.197" height="10.831" viewBox="0 0 6.197 10.831">
                                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.113,11.6,17.2,7.51a.773.773,0,1,0-1.094-1.091l-4.632,4.629a.771.771,0,0,0-.023,1.065L16.1,16.774a.774.774,0,1,0,1.1-1.09Z" transform="translate(17.445 17.003) rotate(180)" fill="#fff" />
                                </svg>
                            </a>
                        </div>
                        <div class="page-table">
                            <table id="fees-table" class="table table-striped custom-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Student Name</th>
                                        <th>Father's Name</th>
                                        <th>Class</th>
                                        <th>Deposit fees</th>
                                        <th>Remaining fees</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0;
                                    @endphp
                                    <tr>
                                        <td>@php echo ++$i @endphp</td>
                                        <td><img class="student-img" src="{{url('/')}}/assets/image/student-1.jpg" /></td>
                                        <td>prem</td>
                                        <td>babu</td>
                                        <td>LKG</td>
                                        <td><span class="deposit-box">2000</span></td>
                                        <td><span class="remain-box">2000</span></td>
                                    </tr>
                                    <tr>
                                        <td>@php echo ++$i @endphp</td>
                                        <td><img class="student-img" src="{{url('/')}}/assets/image/student-2.jpg" /></td>
                                        <td>anklesh</td>
                                        <td>babu</td>
                                        <td>LKG</td>
                                        <td><span class="deposit-box">2000</span></td>
                                        <td><span class="remain-box">2000</span></td>
                                    </tr>
                                    <tr>
                                        <td>@php echo ++$i @endphp</td>
                                        <td><img class="student-img" src="{{url('/')}}/assets/image/student-1.jpg" /></td>
                                        <td>balu</td>
                                        <td>babu</td>
                                        <td>LKG</td>
                                        <td><span class="deposit-box">2000</span></td>
                                        <td><span class="remain-box">2000</span></td>
                                    </tr>
                                    <tr>
                                        <td>@php echo ++$i @endphp</td>
                                        <td><img class="student-img" src="{{url('/')}}/assets/image/student-2.jpg" /></td>
                                        <td>shyam</td>
                                        <td>babu</td>
                                        <td>LKG</td>
                                        <td><span class="deposit-box">2000</span></td>
                                        <td><span class="remain-box">2000</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash-wrap-right">
                <div class="calender-sec">
                    <div id="inline-cal"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection