<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{url('/')}}/assets/css/global.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/data-table.css">
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
                        <img src="{{url('/')}}/assets/image/letter-head.png" alt="">
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
                            <img src="{{url('/')}}/assets/image/letter-head.png" alt="">
                        </a>
                    </div>
                    <ul class="side-menu">
                        <li @if(request()->segment(1) == 'students') class="active" @endif>
                            <a href="{{ url('/students') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/awesome-user-graduate.svg" class="menu-show" alt="">
                                </i>
                                <span>Student</span>
                            </a>
                        </li>
                        <li @if(request()->segment(1) == 'add_class') class="active" @endif>
                            <a href="{{ url('/add_class') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/money.svg" class="menu-show" alt="">
                                </i>
                                <span>Fees Structure</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="javascript:void(0)">
                                <i>
                                    <img src="{{url('/')}}/assets/image/blackboard.svg" class="menu-show" alt="">
                                </i>
                                <span>Classes</span>
                                <span class="drop-arrow">
                                    <img src="{{url('/')}}/assets/image/arrow-down.svg" alt="">
                                </span>
                            </a>
                            @php

                            $posts=  App\Models\Student_classe::get();
                            @endphp
                            <ul class='sub-menus'>
                            @foreach($posts as $post)
                            <li @if(request()->segment(2) == $post->id) class="active" @endif ><a href="{{ url('classes',$post->id) }}"  >{{$post->class_name}}</a></li>
                            @endforeach
  
                        </li>
                    </ul>

                    @if(Auth::check() && Auth::user()->user_type  == "Admin")
                        <!-- <li @if(request()->segment(1) == 'assignrole') class="active" @endif>
                        
                            <a href="{{ url('/assignrole') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/expertise-area.svg" class="menu-show" alt="">
                                </i>
                                <span>Assign Role</span>
                            </a>
                        </li> -->
                    @endif
                        <!-- <li @if(request()->segment(1) == 'roles-permissions') class="active" @endif>
                            <a href="{{ url('/roles-permissions') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/expertise-area.svg" class="menu-show" alt="">
                                </i>
                                <span>Roles & Permission</span>
                            </a>
                        </li> -->
                        <li>

                        <a href="{{ url('/logout') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/logout-1.svg" class="menu-show" alt="">
                                </i>
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
    <script src="{{url('/')}}/assets/js/dataTables.min.js"></script>
    <script src="{{url('/')}}/assets/js/dataTables.buttons.min.js"></script>
    <script src="{{url('/')}}/assets/js/buttons.html5.min.js"></script>
    <script src="{{url('/')}}/assets/js/sweetalert.min.js"></script>
    <script src="{{url('/')}}/assets/js/validate.js"></script>
    <!-- custom js -->
    <script src="{{url('/')}}/assets/js/custom.js"></script>

    <script>
        $('select').on('change', function() {
            var id = $(this).val();
            if (id == 0) {
                location.reload();
            } else {
                $.ajax({
                    url: 'getdata',
                    method: "get",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                       
                        $('#student-table').html(data);
                    }
                });
            }
        });
    </script>
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
        // $('body').on('click', '.student-delete', function(event) {
        //     var form = $(this).closest("form");
        //     var name = $(this).data("name");
        //     var id = $(this).data("id");
        //     event.preventDefault();
        //     swal({
        //             title: `Are you sure you want to delete ${name}?`,
        //             icon: "warning",
        //             buttons: true,
        //             dangerMode: true,
        //         })
        //         .then((willDelete) => {
        //             if (willDelete) {
        //                 $.ajax({
        //                     url: "{{route('students.store')}}" + '/' + id,
        //                     type: "DELETE",
        //                     data: {
        //                         id: id,
        //                         "_token": "{{ csrf_token() }}",
        //                     },
        //                     success: function(data) {
        //                         location.reload();
        //                     }
        //                 });
        //             }
        //         });
        // });
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
</body>

</html>