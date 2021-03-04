<?php

namespace App\Http\Controllers;
use App\Models\Gb;
use App\Models\Student;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
  
    public function classData($id){
      
        $students = Student::where("gbs_id", "=", $id)->get();
        $tests = Gb::all();
        return view('admin.sidebar.views',compact("students","tests"));
    }

    public function sessionData($id){
        $students = Student::where("add_session", "=", $id)->get();
        $tests = Gb::all();
        return view('admin.sidebar.session',compact("students","tests"));
    }
}