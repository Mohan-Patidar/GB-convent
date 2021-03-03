<?php

namespace App\Http\Controllers;
use App\Models\Gb;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;
class StudentController extends Controller
{
    public function index(){
        $tests = Gb::all();
        $students = Student::get();
        return view('admin.student.index',compact("students","tests"));
    }

    public function create()
    {
       
        $tests = Gb::all();
        return view('admin.student.create',compact("tests"));
    }

    public function store(Request $request){

        $request->validate([
        
        ]);

        $students= new Student;
        $students->student_id=$request->student_id;   
        $students->scholar_no=$request->scholar_no; 
        $students->name=$request->name;
        $students->father_name=$request->father_name;
        $students->mother_name=$request->mother_name;
        $students->address=$request->address;
        $students->aadhar_no=$request->aadhar_no;
        $students->samarg_id=$request->samarg_id;
        $students->dob=$request->dob;
        $students->gbs_id=$request->gbs_id;
        $students->mobile_no=$request->mobile_no;
        $students->mobile_no2=$request->mobile_no2;
        $students->add_session=$request->add_session;
        $students->account_no=$request->account_no;
        
        if ($request->hasFile('profile_picture')) {
           
                $profile = $request->file('profile_picture');
                $file_name = time() . '.' . $profile->getClientOriginalExtension();
                $path = public_path('../image/profile_picture');
                $profile->move($path, $file_name);
                $students->profile_picture = $file_name;
            }
            else{
                $students->profile_picture="";
                }
        

        $students->save();
        Session::flash('message', 'Student added successfuly!');
       
        return redirect('students');

    }
    public function show($id)
    {
    
       //
    
    }
    public function edit($student){
        $tests = Gb::all();
        $students = Student::where("id", "=", $student)->first();
    
        return view('admin.student.edit',compact("students","tests"));        
    }

    public function update(Request $request ,$id){
        $request->validate([
           
        ]);
        $students =Student::where("id", "=", $id)->first();
     
        $students->student_id=$request->student_id;   
        $students->scholar_no=$request->scholar_no; 
        $students->name=$request->name;
        $students->father_name=$request->father_name;
        $students->mother_name=$request->mother_name;
        $students->address=$request->address;
        $students->aadhar_no=$request->aadhar_no;
        $students->samarg_id=$request->samarg_id;
        $students->dob=$request->dob;
        $students->gbs_id=$request->gbs_id;
        $students->mobile_no=$request->mobile_no;
        $students->mobile_no2=$request->mobile_no2;
        $students->add_session=$request->add_session;
        $students->account_no=$request->account_no;
        if ($request->hasFile('profile_picture')) {
           
            $profile = $request->file('profile_picture');
            $file_name = time() . '.' . $profile->getClientOriginalExtension();
            $path = public_path('../image/profile_picture');
            $profile->move($path, $file_name);
            $students->profile_picture = $file_name;
        }
        else{
            
            $profile =  $students->profile_picture;
            $students->profile_picture = $profile;
            }
        
        $students->update(); 
        Session::flash('message', 'data updated successfuly!');
        return redirect('students');

    
    }
    public function destroy(request $request){
        $id = $request->all();
        Student::destroy($id);
        // Session::flash('message', ' data delete successfuly!');
       

    }

}
