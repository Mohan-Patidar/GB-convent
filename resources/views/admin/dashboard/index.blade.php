@extends('layouts.adminlayout')
@section('content')

<section class="main-wrapper">
    <div class="page-color">
        <div class="page-header">
            <div class="page-title">
                Dashboard
            </div>
        </div>
       <p> Total Students:{{$student}}</p>

       <p>Current Session:{{$year}}</p>
    </div>
 
</section>

@endsection