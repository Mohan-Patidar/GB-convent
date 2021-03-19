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
                    </div>
                    <div class="recent-fees-sec">
                        <div class="recent-head">
                            <h3>Recent Fees</h3>
                            <a href="" class="add-btn">Fees
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.197" height="10.831" viewBox="0 0 6.197 10.831">
                                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.113,11.6,17.2,7.51a.773.773,0,1,0-1.094-1.091l-4.632,4.629a.771.771,0,0,0-.023,1.065L16.1,16.774a.774.774,0,1,0,1.1-1.09Z" transform="translate(17.445 17.003) rotate(180)" fill="#fff" />
                                </svg>
                            </a>
                        </div>
                        <div class="page-table">
                            <table id="" class="table-striped custom-table" style="width:100%;">
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
                <!-- <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FKolkata&amp;src=OTJkOWpqOWVlOXVhMmtxZnBrZjI0aG1pYThAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZW4uaW5kaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23E4C441&amp;color=%230B8043" style="border:solid 1px #777" width="100%" height="600" frameborder="0" scrolling="no"></iframe> -->
                <div id="calendar">
                    <div id="calendar_header"><i class="icon-chevron-left"></i>
                        <h1></h1><i class="icon-chevron-right"></i>
                    </div>
                    <div id="calendar_weekdays"></div>
                    <div id="calendar_content"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection