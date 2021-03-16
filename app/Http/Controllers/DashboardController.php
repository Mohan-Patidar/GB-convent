<?php

namespace App\Http\Controllers;
use App\Models\Student_fee;
use App\Models\Year;
use App\Models\Student_classe;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Record;


class DashboardController extends Controller
{
    public function index(){
        $student = Student::get()->count();
        $session = Year::where('status','=',1)->get();
        foreach($session as $s){
            $year=$s->years;
        }
       
        return view('admin.dashboard.index',compact("student","year"));
    }
}
