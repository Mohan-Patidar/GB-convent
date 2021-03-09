@extends('layouts.adminlayout')

@section('content')

<div class="page-inner ad-inr">
    <section class="main-wrapper">

        <div class="page-color">
            <div class="page-header">
                <div class="page-title">
                    <span>Student Details </span>
                </div>
           
                </div>
        <h5>Total fees of {{$class}} = {{$amount}}  of  {{$session}} </h5>
        <div>
        <label>Student Id:</label>
        {{$students->student_id}}
     
        </div>
        <div>
        <label>Scholar No.:</label>
        {{$students->scholar_no}}
        </div>
     
        <div>
        <label>Student Name:</label>
        {{$students->name}}
        </div>
        <div>
        <label>Father's Name:</label>
        {{$students->father_name}}
        </div>
        <div>
        <label>Address</label>
        {{$students->address}}
        </div>
     <div>
     <label>Total fees :</label>
     {{$amount}}
     </div>
     <div>
     <label>remaining fees :</label>
     {{$r}}
     </div>

    <div><button onclick="myFunction()">Add</button></div>
    <div id="amount" style="display: none;" >
    <form action="{{route('reports.store')}}" method="post">
    
    @csrf
   
    <input type="hidden" name="id" value="{{$record_id}}">
    <input type="hidden" name="amount" value="{{$amount}}">
    <label>Receipt No. </label>
    <input type="text" name="receipt_no" id="receipt_no">
    <label>Amount to be paid</label>
    <input type="text" name="fees" id="fees">
    <label>Date</label>
    <input type="date" name="date">
    <label>Description</label>
    <input type="text" name="description">
    <input type="submit" name="save" class="login-btn" id="save" value="Add">
    </form>
    </div>
  
    @if(App\Models\Report::where('records_id',$record_id)->exists())
    <div class="page-table">
                <table id="" class="table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Receipt No.</th>
                            <th>Paid Fees</th>
                            <th>Date</th>
                            <th>Description</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; 
                        $posts = App\Models\Report::where("records_id","=",$record_id)->get();
                        
                        @endphp
                        @foreach($posts as $post)
                        <tr>
                            <td>@php echo ++$i @endphp</td>
                            <td>{{$post->receipt_no}}</td>
                            <td>{{$post->fees}}</td>
                            <td>{{$post->date}}</td>
                            <td>{{$post->description}}</td>
                            
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

@endif
</section>
@endsection
<script>
function myFunction() {
  var x = document.getElementById("amount");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  
}
 
</script>