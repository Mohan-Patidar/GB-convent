<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.B.Convent</title>
    <link rel="stylesheet" href="{{url('/')}}/assets/css/global.css">
</head>

<body>
    <!-- dashboard starts here -->
    <main>
        <!-- sidebar start -->
        <aside class="main-aside">
            <div class="sidebar-wrapper">
                <!-- logo -->
                <div class="main-logo">
                    <a href="#">
                        <img class="desk-show" src="{{url('/')}}/assets/image/logo-blue.svg" alt="">
                        <img class="mob-show" src="{{url('/')}}/assets/image/logo-icon.svg" alt="">
                    </a>
                </div>
                <div class="overlay-close"></div>
                <!-- navigations  -->
                <div class="menu-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="main-menus">
                    <div class="menu-logo">
                        <a href="#">
                            <img class="desk-show" src="{{url('/')}}/assets/image/logo-blue.svg" alt="">
                            <img class="mob-show" src="{{url('/')}}/assets/image/logo-icon.svg" alt="">
                        </a>
                    </div>
                    <ul class="side-menu">
                        <li @if(request()->segment(1) == 'dashboard') class="active" @endif>
                            <a href="{{ url('/dashboard') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/dashboard-icon.svg" class="menu-show" alt="">
                                </i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li @if(request()->segment(1) == 'students') class="active" @endif>
                            <a href="{{ url('/students') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/student-icon.svg" class="menu-show" alt="">
                                </i>
                                <span>Student</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i>
                                    <img src="{{url('/')}}/assets/image/session-icon.svg" class="menu-show" alt="">
                                </i>
                                <span>Session</span>
                                <span class="drop-arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.831" height="6.197" viewBox="0 0 10.831 6.197">
                                        <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.113,11.6,17.2,7.51a.773.773,0,1,0-1.094-1.091l-4.632,4.629a.771.771,0,0,0-.023,1.065L16.1,16.774a.774.774,0,1,0,1.1-1.09Z" transform="translate(-6.172 17.445) rotate(-90)" fill="#000" />
                                    </svg>
                                </span>
                            </a>
                            @php
                            $posts= App\Models\Year::orderBy('id', 'DESC')->get();
                            @endphp

                            <ul class='sub-menus'>
                                @foreach($posts as $post)
                                <li @if(request()->segment(2) == $post->id) class="active" @endif ><a href="{{ url('year',$post->id) }}">{{$post->years}}</a></li>
                                @endforeach

                        </li>
                    </ul>
                    <li @if(request()->segment(1) == 'assignrole') class="active" @endif>

                        <a href="{{ url('/assignrole') }}">
                            <i>
                                <img src="{{url('/')}}/assets/image/expertise-area.svg" class="menu-show" alt="">
                            </i>
                            <span>Assign Role</span>
                        </a>
                    </li>

                    <!-- <li @if(request()->segment(1) == 'roles-permissions') class="active" @endif>
                            <a href="{{ url('/roles-permissions') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/expertise-area.svg" class="menu-show" alt="">
                                </i>
                                <span>Roles & Permission</span>
                            </a>
                        </li> -->
                    <li @if(request()->segment(1) == 'feesstructure') class="active" @endif>
                        <a href="{{ url('/feesstructure') }}">
                            <i>
                                <img src="{{url('/')}}/assets/image/fees-structure-icon.svg" class="menu-show" alt="">
                            </i>
                            <span>Fees Structure</span>
                        </a>
                    </li>
                    @if(Auth::check() && Auth::user()->user_type == "Admin")
                    <li @if(request()->segment(1) == 'years') class="active" @endif>
                        <a href="{{ url('/years') }}">
                            <i>
                                <img src="{{url('/')}}/assets/image/add-session-icon.svg" class="menu-show" alt="">
                            </i>
                            <span>Add Session</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="">
                            <i>
                                <img src="{{url('/')}}/assets/image/setting-icon.svg" class="menu-show" alt="">
                            </i>
                            <span>Settings</span>
                        </a>
                    </li>
                    </ul>
                    <ul class="log-our-sec">
                        <li>
                            <a href="{{ url('/logout') }}">
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        @yield('content')
    </main>
    <!-- dashboard ends here -->

    <!-- data table js -->
    <script src="{{url('/')}}/assets/js/jquery-3.5.1.min.js"></script>
    <script src="{{url('/')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/assets/js/datatables.min.js"></script>
    <script src="{{url('/')}}/assets/js/dataTables.checkboxes.min.js"></script>
    <script src="{{url('/')}}/assets/js/dataTables.buttons.min.js"></script>
    <script src="{{url('/')}}/assets/js/buttons.html5.min.js"></script>
    <script src="{{url('/')}}/assets/js/sweetalert.min.js"></script>
    <script src="{{url('/')}}/assets/js/validate.js"></script>
    <script src="{{url('/')}}/assets/js/bootstrap-datepicker.js"></script>
    <!-- custom js -->
    <script src="{{url('/')}}/assets/js/custom.js"></script>


    <script>
        // class script
        $("#changes").change(function() {
            var id = $(this).val();
            var yid = $('#changes option:selected').attr("session");
            location.href = location.origin + '/GB-convent/classes/' + id + '/' + yid;
        });

        //  fees javascript 
        $(".addFees").click(function() {
            $('#myfeesModal').modal('show');
        });
        $(".editfees").click(function() {
            var url = $(this).attr('data-href');
            $.ajax({
                url: url,
                method: "GET",
                success: function(fb) {
                    var resp = $.parseJSON(fb);
                    $('#student_classes_ids').html(resp.output);
                    $('#year_ids').html(resp.y_output);
                    $('#main_id').val(resp.id);
                    $('#amounts').val(resp.amount);
                }
            });
            $('#myEfeesModal').modal('show');
        });
        $(document).on('click', '.deleteUser', function() {
            var userID = $(this).attr('data-id');
            $('#app_id').val(userID);
            $('#feesDeleteModal').modal('show');
        });

        // student
        $(".addStudent").click(function() {
            $('#myaddModal').modal('show');
        });
        $(document).on('click', '.deletestudent', function() {
            var userID = $(this).attr('data-id');
            var recordID = $(this).attr('data-name');
            $('#s_id').val(userID);
            $('#r_id').val(recordID);
            $('#studentDeleteModal').modal('show');
        });
        $(".studentpopup").click(function() {
            var url = $(this).attr('data-href');
        
            $.ajax({
                url: url,
                method: "GET",
                success: function(fb) {
                   
                    var resp = $.parseJSON(fb);
                    $('#student_ids').val(resp.student_ids);
                    $('#scholar_nos').val(resp.scholar_nos);
                    $('#names').val(resp.names);
                    $('#fname').val(resp.fname);
                    $('#mname').val(resp.mname);
                    $('#addres').val(resp.addres);
                    $('#acc').val(resp.acc);
                    $('#m2').val(resp.m2);
                    $('#m1').val(resp.m1);
                    $('#sdob').val(resp.sdob);
                    $('#samargid').val(resp.samargid);
                    $('#aadhar').val(resp.aadhar);
                    $('#classes').html(resp.output);
                    $('#sessions').html(resp.y_output);
                    $('#sIds').val(resp.id);
                }
            });
            
            $('#mystudentModal').modal('show');
        });
        
        //import 
        $('.import').click(function() {
            $("#file").click();
        });
        $('#file').change(function() {
            $('#submit').click();
        });

        //export
        $('#export').click(function() {
            $('.buttons-csv').click();
        });
        
        //edit fees receipt
        $(".passingID").click(function() {
            var ids = $(this).attr('data-id');
            var record_id = $(this).attr('record-id');
            var d = $(this).attr('d');
            var r = $(this).attr('r');
            var fee = $(this).attr('fee');
            var dat = $(this).attr('dat');
            $("#idkl").val(record_id);
            $('#main_id').val(ids);
            $('#description').val(d);
            $('#receipt').val(r);
            $('#fee').val(fee);
            $('#date').val(dat);
            $('#myeditModal').modal('show');
        });

        //assign role
        $(".addUser").click(function() {
            $('#myAssignModal').modal('show');
        });
        $(".editrole").click(function() {
            var url = $(this).attr('data-href');
           
            $.ajax({
                url: url,
                method: "GET",
                success: function(fb) {
                   
                    var resp = $.parseJSON(fb);
                    // $('#passwords').val(resp.password);
                    $('#uid').val(resp.id);
                    $('#uname').val(resp.name);
                }
            });
            $('#myAssignEModal').modal('show');
        });
        $(document).on('click', '.deleterole', function() {
            var userID = $(this).attr('data-id');
            $('#app_id').val(userID);
            $('#RoleDeleteModal').modal('show');
        });

        // group calendar
        $('.input-daterange').datepicker({
            todayHighlight: true,
            autoclose: true
        });

        // inline calendar
        $('#inline-cal').datepicker({
            todayHighlight: true,
            daysOfWeekHighlighted: "0",
        });

        $('.datepicker-days table').attr('cellspacing', '7');
    </script>
    <script>
        $('.role-delete').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var id = $(this).data("id");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete ${name}?`,

                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{route('assignrole.store')}}" + '/' + id,
                            type: "DELETE",
                            data: {
                                id: id,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    }
                });
        });
    </script>
</body>

</html>