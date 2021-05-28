<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G.B.Convent</title>
    <link rel="stylesheet" href="{{url('/')}}/assets/css/global.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"> -->
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
                            <a href="{{ url('/students') }}" class="student">
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
                                <img src="{{url('/')}}/assets/image/assign-role.svg" class="menu-show" alt="">
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
                    <li @if(request()->segment(1) == 'extrapay') class="active" @endif>
                            <a href="{{ url('/extrapay') }}">
                                <i>
                                    <img src="{{url('/')}}/assets/image/extra.svg" class="menu-show" alt="">
                                </i>
                                <span>Extra Pay</span>
                            </a>
                        </li>
                    <li @if(request()->segment(1) == 'profile') class="active" @endif>
                        <a href="{{ url('/profile') }}">
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
    <!-- <script src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script> -->
    <script src="{{url('/')}}/assets/js/datatables.min.js"></script>
    <script src="{{url('/')}}/assets/js/dataTables.checkboxes.min.js"></script>
    <script src="{{url('/')}}/assets/js/dataTables.buttons.min.js"></script>
    <script src="{{url('/')}}/assets/js/buttons.html5.min.js"></script>
  
    <script src="{{url('/')}}/assets/js/validate.js"></script>
    <script src="{{url('/')}}/assets/js/bootstrap-datepicker.js"></script>
    <!-- custom js -->
    <script src="{{url('/')}}/assets/js/custom.js"></script>


    <script>
 
   
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

        // Fees deposite
        $(".deposit-modal").click(function() {
            $('#feeDepositModal').modal('show');
        });
        $(document).on('click', '.deletestudent', function() {
            var userID = $(this).attr('data-id');
            var recordID = $(this).attr('data-name');
            $('#s_id').val(userID);
            $('#r_id').val(recordID);
            $('#studentDeleteModal').modal('show');
        });
        $(document).on('click', '.deletereport', function() {
            var userID = $(this).attr('data-id'); 
            
            $('#report_id').val(userID); 
            $('#reportDeleteModal').modal('show');
        });
        $(".studentpopup").click(function() {
            var url = $(this).attr('data-href');
            var fees = $(this).attr('fees-href');
            
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
                    $('#student-id').val(resp.id);
                  
                    $.ajax({

                        url: fees,
                        method: "GET",
                        success: function(data) {
                            // console.log(data);
                            var resp = $.parseJSON(data);
                            if(resp.success ==0){
                               $('#tabs-2').html(resp.message);
                            }else{
                            $('.student_ids').html(resp.students.student_id);
                            $('.scholar').html(resp.students.scholar_no);
                            $('.s_name').html(resp.students.name);
                            $('.f_name').html(resp.students.father_name);
                            $('.m_name').html(resp.students.mother_name);
                            $('.address').html(resp.students.address);
                            $('.contact').html(resp.students.mobile_no);
                            $('.amounts').html(resp.amount);
                            $('.remaining').html(resp.r);
                            $('#record_id').val(resp.record_id);
                            $('#total_amount').val(resp.amount);
                            $('.student-fees').html(resp.table);
                            $('#profile_pic').html(resp.profile);
                            $('#c_id').val(resp.cid);

                        }
                        }
                    });

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
        $('body').on('click', '.passingID', function() {
            var ids = $(this).attr('data-id');
            var record_id = $(this).attr('record-id');
            var d = $(this).attr('d');
            var r = $(this).attr('r');
            var fee = $(this).attr('fee');
            var dat = $(this).attr('dat');
            $("#idkl").val(record_id);
            $('#main_id').val(ids);
            $('#descriptions').val(d);
            $('#receipt').val(r);
            $('#fee').val(fee);
            $('#dates').val(dat);
            $('#feeEditModal').modal('show');

        });
       


        //dashboard
        $(".earning").click(function() {
            var start = $("#starts").val();
            var end = $("#ends").val();
            $.ajax({
                url: 'datefilter',
                method: "Post",
                data: {
                    start: start,
                    end: end,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(fb) {
                    $('#total').html(fb.total);
                    $('.fees-tables').html(fb.table);
                    // console.log(fb);
                }
            });
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

        // inline calendar
        $('.birth-date input').datepicker({
            todayHighlight: true,
            daysOfWeekHighlighted: "0",
        });

        $('.datepicker-days table').attr('cellspacing', '7');
    </script>
    <script>
        
             //fees deposite
       
function saveData(formId, action_url, responseDiv) {


formId = '#' + formId;
var formData = new FormData(jQuery(formId)[0]);


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
    url: action_url,
    data: formData,
    type: 'POST',
    processData: false,
    contentType: false,
    success: function(res) {

        var res = jQuery.parseJSON(res);
    // console.log(res);
        if (res.status == 'succes') {
            location.reload();
        }
        if (res.status == 'success') {
            $(formId).trigger('reset');
            $('.' + responseDiv).html('<div class="alert alert-success">' + res.msg + '<button type="button" class="closedeposite" data-dismiss="modal">x</button></div>');
            $('.student-fees').html(res.table);
            $('.remaining').html(res.re);
            $(document).click(function (event) {            
            $(".msg").html('');
            });
            
            
        }
        
         else {
            $('.' + responseDiv).html('<div class="alert alert-danger">' + res.msg + '</div>');
            setTimeout(function() {
                $('.' + responseDiv).html('');
            }, 4000);
        }
    },
    
});
}

$('#but-save').click(function(){
    

        $("#add-fees").validate({
        rules: {
            fees: {
            required: true,
            
            },
            receipt_no: {
            required: true,
      
            },
            date: {
            required: true,
      
            },
            action: "required"
            },
        messages: {
            fees: {
            required: "fees is required",
            
            },
            receipt_no: {
            required: "receipt no is required",
            
            },
            date: {
            required: "Date is required",
            
            },
        },
        submitHandler: function() {
            saveData("add-fees","{{route('reports.store')}}","msg");
    }
});

    
    
});
$('#but-edit').click(function(){
    saveData("edit-fees","{{url('report')}}","msg");
});

$('.addstudent').click(function(){
        $('#studentModal').modal('show');
        $('.addfees').click(function(){
    saveData("extrapays","{{url('extraStore')}}","msg");
    
});
    });
    $('.showdetails').click(function(){
    var id = $(this).attr('data-id');
    var old = $(this).attr('data-name');
    $.ajax({

        url: "showdetails", 
            method:"post",
            data:{
                id:id, 
                old:old,
                "_token": "{{ csrf_token() }}",           
            },
            success: function(fb) { 
                var res=jQuery.parseJSON(fb);
                // console.log(res);
                $('.gave').html(res.gave);
                $('.take').html(res.due);
            $('.s_name').html(res.student.name);
            $('.f_name').html(res.student.fname);
            $('.m_name').html(res.student.mname);
            $('#old_pric').val(old);
            $('#s_id').val(id);
            $('#showdetail').modal('show'); 
                     
       }
        });   
});
$(".addpayment").click(function() {

    var id = $('#s_id').val();
    var old =$('#old_pric').val();
    $('#id').val(id);
    $('#old_price').val(old);
    $('#gavepayment').modal('show');
    $('.addpay').click(function(){
        $("#gave").validate({
        rules: {
            price: {
            required: true,
            
            },
            action: "required"
            },
        messages: {
            price: {
            required: "amount is required",
            },
           
        },
        submitHandler: function() {
            var price = $("#prices").val();
        var date = $("#dates").val();
        var detail = $("#details").val();
        $.ajax({
            url:'addpayment',
            method:"post",
            data:{
                old_price:old,
                id:id,
                price:price,
                date:date,
                detail:detail,
                "_token": "{{ csrf_token() }}",
            },
            success: function(fb) {
                var res=jQuery.parseJSON(fb);
                $('#gave').trigger('reset');  
                $('.message').html('<div class="alert alert-success">' + res.msg + '<button type="button" class="closedeposite" data-dismiss="modal">x</button></div>');
                $('.gave').html(res.gave);
                $('.take').html(res.due);
                $(document).click(function (event) {            
                $(".message").html('');
                
             });  
            //  location.reload();          
       }
        });
    }
});
        
        
});
        });

    $(".subpayment").click(function(){
    var id = $('#s_id').val();
    var old =$('#old_pric').val();
    $('#ids').val(id);
    $('#oldprice').val(old);
    $('#subpayment').modal('show');
    
    $('.subpay').click(function(){
        $("#takeamount").validate({
        rules: {
            price: {
            required: true,
            
            },
          
            action: "required"
            },
        messages: {
            price: {
            required: "amount is required",
            
            },
          
        },
        submitHandler: function() {
        var price = $("#tprices").val();
        var date = $("#tdates").val();
        var detail = $("#tdetails").val();

        $.ajax({
            url:'subpayment',
            method:"post",
            data:{
                old_price:old,
                id:id, 
                price:price,
                date:date,
                detail:detail,
                "_token": "{{ csrf_token() }}",           
            },
            success: function(fb) {
                var res=jQuery.parseJSON(fb);
                $('#takeamount').trigger('reset');  
                $('.message').html('<div class="alert alert-success">' + res.msg + '<button type="button" class="closedeposite" data-dismiss="modal">x</button></div>');
                
                $('.gave').html(res.gave);
                $('.take').html(res.due);
                $(document).click(function (event) {            
                $(".message").html('');
                
             });
            //  location.reload();       
       }
        });
           
    }
});
       
       
});
});
   //result
$(document).ready(function(){
 
 $('.subject1').keyup(function(){
     var res = 0 ; 
     $(".subject1").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total1').val(res);
 });
 $('.subject2').keyup(function(){
     var res = 0 ; 
     $(".subject2").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total2').val(res);
 });
 $('.subject3').keyup(function(){
     var res = 0 ; 
     $(".subject3").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total3').val(res);
 });
 $('.subject4').keyup(function(){
     var res = 0 ; 
     $(".subject4").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total4').val(res);
 });
 $('.subject5').keyup(function(){
     var res = 0 ; 
     $(".subject5").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total5').val(res);
 });
 $('.subject6').keyup(function(){
     var res = 0 ; 
     $(".subject6").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total6').val(res);
 });
 $('.subm1').keyup(function(){
     var res = 0 ; 
     $(".subm1").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total7').val(res);
 
 });
 $('.subm2').keyup(function(){
     var res = 0 ; 
     $(".subm2").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total8').val(res);
 });
 $('.subm3').keyup(function(){
     var res = 0 ; 
     $(".subm3").each(function() {
         if(parseInt($(this).val()))
      res += parseInt($(this).val());
     });
     $('#total9').val(res);
 });
 
 });

 </script>

</body>

</html>