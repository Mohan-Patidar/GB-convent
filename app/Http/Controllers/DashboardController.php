<?php

namespace App\Http\Controllers;

use App\Models\Student_fee;
use App\Models\Year;
use App\Models\Student_classe;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Record;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $report= DB::table("reports")->latest()->take(5)->get()->sum("fees");
        $total = $report;
        $student = 0;
        $year = 0;
        $student = Student::get()->count();
        $session = Year::where('status', '=', 1)->get();
        foreach ($session as $s) {
            $year = $s->years;
        }
       
        $classes = Student_classe::get();
        $users = DB::table('students')
        ->join('records', 'students.id', '=', 'records.students_id')
        ->join('reports', 'records.id', '=', 'reports.records_id')
        ->select('students.*', 'records.class_name', 'reports.fees')->latest()->take(5)->get();
        
       
        $fees = Student_fee::get();


       

        // var_dump($users);
        
        return view('admin.dashboard.index', compact("student", "year", "total","users","classes","fees"));
    }

    public function DateFilter(Request $request)
    {
        $total=0;
        $from = $request->start;
        $to  = $request->end;
        

        $classes = Student_classe::get();
        $fees = Student_fee::get();
        $users = DB::table('students')
        ->join('records', 'students.id', '=', 'records.students_id')
        ->join('reports', 'records.id', '=', 'reports.records_id')
        ->select('students.*', 'records.class_name', 'reports.fees')->whereBetween('date',[$from, $to])->get();

        
        foreach($users as $u){
            $total += $u->fees;
        }
       
    
       
        $table ='';
        $m=1;
        foreach($users as $u) {
            foreach($classes as $c){
                if($c->id==$u->class_name){
                    $class=$c->class_name;
                }
                foreach($fees as  $f){
                    if($f->student_classes_id==$u->class_name)
                        $fee =$f->amount - $u->fees;
                        
                    }
            }
            $table .= '<tr>
                    <td>' . $m++. '</td>
                    <td>'.((($u->profile_picture==NULL)==true) ?'<img class="student-img" src="image/profile_picture/download.png" />':
                    '<img class="student-img" src="image/profile_picture/' . $u->profile_picture .'"/>').'</td>
                    <td>' . $u->name . '</td>
                    <td>' . $u->father_name . '</td>
                    <td>'.$class.'</td>
                    <td>' . $u->fees . '</td>
                    <td>'.$fee.'</td>
                </tr>';
            
        }
         return response()->json(["total"=>$total,"table"=>$table]);
        // return response()->json($table);
        
    }
}
