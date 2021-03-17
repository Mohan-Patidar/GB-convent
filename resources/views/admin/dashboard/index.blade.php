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

        <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FKolkata&amp;src=OTJkOWpqOWVlOXVhMmtxZnBrZjI0aG1pYThAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZW4uaW5kaWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23E4C441&amp;color=%230B8043" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
        <div class="page-table">
            <table id="" class="table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>S.No.</th>
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>




    </div>
</section>

@endsection