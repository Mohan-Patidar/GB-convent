<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.B.Convent</title>
    <link rel="stylesheet" href="{{url('/')}}/assets/css/global.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
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
                        <li >
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
                            <li @if(request()->segment(2) == $post->id) class="active" @endif ><a href="{{ url('year',$post->id) }}"  >{{$post->years}}</a></li>
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
                    <li @if(request()->segment(1) == 'add_class') class="active" @endif>
                        <a href="{{ url('/add_class') }}">
                            <i>
                                <img src="{{url('/')}}/assets/image/fees-structure-icon.svg" class="menu-show" alt="">
                            </i>
                            <span>Fees Structure</span>
                        </a>
                    </li>
                    @if(Auth::check() && Auth::user()->user_type  == "Admin")
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
     <script src="{{url('/')}}/assets/js/datatables1.min.js"></script>
    <script src="{{url('/')}}/assets/js/dataTables.checkboxes.min.js"></script>
    <script src="{{url('/')}}/assets/js/dataTables.buttons.min.js"></script>
    <script src="{{url('/')}}/assets/js/buttons.html5.min.js"></script>
    <script src="{{url('/')}}/assets/js/sweetalert.min.js"></script>
    <script src="{{url('/')}}/assets/js/validate.js"></script>
    <!-- custom js -->
    <script src="{{url('/')}}/assets/js/custom.js"></script>
    <script>
        $('.delete-confirm').click(function(event) {
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
                            url: "{{route('add_class.store')}}" + '/' + id,
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
        $('body').on('click', '.student-delete', function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            var id = $(this).data("id");
             var url = location.origin;
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete ?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url+"/GB-convent/delete",
                            type: "DELETE",
                            data: {
                                id: id,
                                r_id: name,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(data) {

                                location.reload();
                            }
                        });
                    }
                });
        });
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
    <script>
        $('.import').click(function() {
            $("#file").click();
        });
        $('#file').change(function() {
            $('#submit').click();
        });
    </script>
    <script>
        $('#export').click(function() {
            $('.buttons-csv').click();
        });
    </script>
     <script>
    $(".passingID").click(function () {
    var ids = $(this).attr('data-id');
    var record_id = $(this).attr('record-id');
    var d = $(this).attr('d');
    var r = $(this).attr('r');
    var fee = $(this).attr('fee');
    var dat = $(this).attr('dat');
    $("#idkl").val(record_id );
    $('#main_id').val(ids);
    $('#description').val(d);
    $('#receipt').val(r);
    $('#fee').val(fee);
    $('#date').val(dat);
    $('#myeditModal').modal('show');
});
    </script>
    <script>
        $(function() {
            function c() {
                p();
                var e = h();
                var r = 0;
                var u = false;
                l.empty();
                while (!u) {
                    if (s[r] == e[0].weekday) {
                        u = true
                    } else {
                        l.append('<div class="blank"></div>');
                        r++
                    }
                }
                for (var c = 0; c < 42 - r; c++) {
                    if (c >= e.length) {
                        l.append('<div class="blank"></div>')
                    } else {
                        var v = e[c].day;
                        var m = g(new Date(t, n - 1, v)) ? '<div class="today">' : "<div>";
                        l.append(m + "" + v + "</div>")
                    }
                }
                var y = o[n - 1];
                a.css("background-color", y).find("h1").text(i[n - 1] + " " + t);
                f.find("div").css("color", y);
                l.find(".today").css("background-color", y);
                d()
            }

            function h() {
                var e = [];
                for (var r = 1; r < v(t, n) + 1; r++) {
                    e.push({
                        day: r,
                        weekday: s[m(t, n, r)]
                    })
                }
                return e
            }

            function p() {
                f.empty();
                for (var e = 0; e < 7; e++) {
                    f.append("<div>" + s[e].substring(0, 3) + "</div>")
                }
            }

            function d() {
                var t;
                var n = $("#calendar").css("width", e + "%");
                n.find(t = "#calendar_weekdays, #calendar_content").css("width", e + "%").find("div").css({
                    width: e / 7 + "%",
                    height: 400 / 7 + "px",
                    "line-height": 400 / 7 + "px"
                });
                n.find("#calendar_header").css({
                    height: 300 * (1 / 5) + "px"
                }).find('i[class^="icon-chevron"]').css("line-height", e * (1 / 4) + "px")
            }

            function v(e, t) {
                return (new Date(e, t, 0)).getDate()
            }

            function m(e, t, n) {
                return (new Date(e, t - 1, n)).getDay()
            }

            function g(e) {
                return y(new Date) == y(e)
            }

            function y(e) {
                return e.getFullYear() + "/" + (e.getMonth() + 1) + "/" + e.getDate()
            }

            function b() {
                var e = new Date;
                t = e.getFullYear();
                n = e.getMonth() + 1
            }
            var e = 100;
            var t = 2013;
            var n = 9;
            var r = [];
            var i = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
            var s = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
            var o = ["#16a085", "#1abc9c", "#c0392b", "#27ae60", "#FF6860", "#f39c12", "#f1c40f", "#e67e22", "#2ecc71", "#e74c3c", "#d35400", "#2c3e50"];
            var u = $("#calendar");
            var a = u.find("#calendar_header");
            var f = u.find("#calendar_weekdays");
            var l = u.find("#calendar_content");
            b();
            c();
            a.find('i[class^="icon-chevron"]').on("click", function() {
                var e = $(this);
                var r = function(e) {
                    n = e == "next" ? n + 1 : n - 1;
                    if (n < 1) {
                        n = 12;
                        t--
                    } else if (n > 12) {
                        n = 1;
                        t++
                    }
                    c()
                };
                if (e.attr("class").indexOf("left") != -1) {
                    r("previous")
                } else {
                    r("next")
                }
            })
        })
    </script>
</body>
</html>