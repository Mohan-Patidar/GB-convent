<?php

namespace App\Http\Controllers;

use App\Models\Student_fee;
use App\Models\Year;
use App\Models\Student_classe;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Record;
use App\Models\Report;


class DashboardController extends Controller
{
    public function index()
    {
        $total = 0;
        $student = 0;
        $year = 0;
        $student = Student::get()->count();
        $session = Year::where('status', '=', 1)->get();
        foreach ($session as $s) {
            $year = $s->years;
        }

        $reports = Report::get();
        foreach ($reports as $r) {
            $student_id = $r->records_id;
        }


        return view('admin.dashboard.index', compact("student", "year", "total"));
    }

    public function DateFilter(Request $request)
    {
        $total=0;
        $from = date('Y-m-d', strtotime($request->start));
        $to  = date('Y-m-d', strtotime($request->end));

        $reports = Report::whereBetween('date',[$from, $to])->selectRaw('sum(fees)')->groupBy('date')->get();
        foreach($reports as $r){
           $total=$r->sum('fees');
        }
        $report = Report::whereBetween('date', [$from, $to])->selectRaw('records_id')->selectRaw('fees')->get();
        
        $b = array();
       
        foreach ($report as $re) {
            $record_id = $re->records_id;
            // $record_fees =$re->fees;

            $record = Record::where("id", "=", $record_id)->get();
            $cid = $record[0]->class_name;
            $classes = Student_classe::where("id", "=", $cid)->get();
          
            $sid = $record[0]->students_id;

            $students = Student::where("id", "=", $sid)->get();
            array_push($b, $students[0]);
        }
        $l = count($b);
        $table = '';
        $c=1;
        for ($i = 0; $i < $l; $i++) {

            $table .= '<tr>
                    <td>' . $c++. '</td>
                    <td><img class="student-img" src="image/profile_picture/' . $b[$i]->profile_picture . '"/></td>
                    <td>' . $b[$i]->name . '</td>
                    <td>' . $b[$i]->father_name . '</td>
                    <td>'. $classes[0]->class_name.'</td>
                    <td></td>
                    <td></td>
                </tr>';
        }
         return response()->json(["total"=>$total,"table"=>$table]);
        // return response()->json( );
    }
}
