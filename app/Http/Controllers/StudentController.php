<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Student_classe;
use App\Models\Student;
use App\Models\Record;
use App\Models\Report;

use App\Models\Student_fee;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    public function index()
    {
        $students=0;  $y_name=0;
        $tests=0;   $y_id=0; $records=0;
        $tests = Student_classe::all();
        $records = Record::get();
        $year = Year::get();
        foreach($year as $y){
            if($y->status==1){
                $y_id=$y->id;
                $y_name=$y->years;
            }
        }
        $students = Student::get();
     
        return view('admin.student.index', compact("students", "tests", "records","y_id","y_name","year"));
    // }
}

    public function create()
    {
        $tests = Student_classe::all();
        $year = Year::all();

        return view('admin.student.create', compact("tests", "year"));
    }

    public function store(Request $request)
    {
      
        $request->validate([]);

        $students = new Student;
        $students->student_id = $request->student_id;
        $students->scholar_no = $request->scholar_no;
        $students->name = $request->name;
        $students->father_name = $request->father_name;
        $students->mother_name = $request->mother_name;
        $students->address = $request->address;
        $students->aadhar_no = $request->aadhar_no;
        $students->samarg_id = $request->samarg_id;
        $students->dob = $request->dob;

        $students->mobile_no = $request->mobile_no;
        $students->mobile_no2 = $request->mobile_no2;

        $students->account_no = $request->account_no;


        if ($request->hasFile('profile_picture')) {

            $profile = $request->file('profile_picture');
            $file_name = time() . '.' . $profile->getClientOriginalExtension();
            $path = public_path('../image/profile_picture');
            $profile->move($path, $file_name);
            $students->profile_picture = $file_name;
        } else {
            $students->profile_picture = "";
        }
        $students->save();
        $records = new Record;
        $records->students_id = $students->id;
        $records->class_name = $request->class_name;
        $records->session = $request->session;
        $records->save();
        Session::flash('message', 'Student added successfuly!');

        return redirect('students');

    }
    public function show()
    {
       
    }
    public function edit($student)
    {
       
      
       
        $records = Record::where("students_id", "=", $student)->first();
        $students = Student::where("id", "=", $student)->first();
        $cid=$records->class_name;
        $yid=$records->session;
        $class = Student_classe::all();
      
            $output = '';
            foreach($class as $c){
                $output .= '<option value="'.$c->id. ',' .$records->id.'" '.(($cid == $c->id) ? 'selected="selected"':"").'>'.$c->class_name.'</option>';  
            }

            $year = Year::all();
        $year_output ='';
        foreach($year as $y){
            $year_output .= '<option value="'.$y->id.'" '.(($yid == $y->id) ? 'selected="selected"':"").'>'.$y->years.'</option>';  
        }
            

        $arr = array('id'=>$students->id,'student_ids'=>$students->student_id,'scholar_nos'=>$students->scholar_no,'names'=>$students->name,'fname'=> $students->father_name,'mname'=>$students->mother_name,'addres'=> $students->address,
    'aadhar'=> $students->aadhar_no,'samargid'=>$students->samarg_id,'sdob'=>$students->dob,'m1'=>$students->mobile_no ,'m2'=>$students->mobile_no2,'acc'=> $students->account_no,'output'=>$output,'y_output'=>$year_output);
        echo json_encode($arr); 
       
        // return  $cid;
    }

    public function update(Request $request)
    {
        $id = $request->sId;
        $students = Student::where("id", "=", $id)->first();

        $students->student_id = $request->student_id;
        $students->scholar_no = $request->scholar_no;
        $students->name = $request->name;
        $students->father_name = $request->father_name;
        $students->mother_name = $request->mother_name;
        $students->address = $request->address;
        $students->aadhar_no = $request->aadhar_no;
        $students->samarg_id = $request->samarg_id;
        $students->dob = $request->dob;

        $students->mobile_no = $request->mobile_no;
        $students->mobile_no2 = $request->mobile_no2;

        $students->account_no = $request->account_no;
        if ($request->hasFile('profile_picture')) {

            $profile = $request->file('profile_picture');
            $file_name = time() . '.' . $profile->getClientOriginalExtension();
            $path = public_path('../image/profile_picture');
            $profile->move($path, $file_name);
            $students->profile_picture = $file_name;
        } else {

            $profile =  $students->profile_picture;
            $students->profile_picture = $profile;
        }

        $students->update();

        $record_id = explode(',', $request->class_name)[1];
        $class = explode(',', $request->class_name)[0];

        $records = Record::where("id", "=", $record_id)->first();
        $records->students_id = $students->id;
        $records->session = $request->session;
        $records->class_name = $class;
        $records->update();
        Session::flash('message', 'data updated successfuly!');
        return redirect('students');
    }
    public function destroy(Request $request)
    { 
        $id = $request->input('sid');
        $rid = $request->input('rid');
      
        Student::destroy($id);
        Record::destroy($rid);

        Session::flash('message', ' data delete successfuly!');
        return redirect('students');
    }
     public function delete(Request $request)
    {
        // 
    }
    public function StudentShow($student,$session){
        
       
        $records = Record::where("students_id", "=", $student)->where("session", "=", $session)->first();
       
        $year = Year::where("id", "=",$session)->first();
        $sessions = $year->years;
        $session_id = $year->id;
        $classes = Student_classe::where("id", "=", $records->class_name)->first();
        $class = $classes->class_name;


        if(Student_fee::where("student_classes_id", "=", $records->class_name)->exists()) {
            $tests = Student_fee::where("student_classes_id", "=", $records->class_name)->where("years_id", "=",$session)->first();


            $amount = $tests->amount;

            $sum = Report::where("records_id", "=", $records->id)->sum('fees');

            $r = $amount - $sum;

            $students = Student::where("id", "=", $student)->first();
            $record_id = $records->id;

            $reports= Report::where("records_id","=",$record_id)->get();
            $l = count($reports);
            $table = '';
           
            for ($i = 0; $i < $l; $i++) {
          
                $table .= '<tr>
                        <td>' . $reports[$i]->receipt_no . '</td>
                        <td>' . $reports[$i]->fees . '</td>
                        <td>'.$reports[$i]->date.'</td>
                        <td>'.$reports[$i]->description.'</td>
                        <td><ul class="d-flex">
                        <li class="tool tool-edit">
                            <a class="edit-btn passingID" href="javascript:void(0)"  r="'.$reports[$i]->receipt_no.'" dat="'.$reports[$i]->date.'" fee="'.$reports[$i]->fees.'" data-id="'.$reports[$i]->id.'" record-id="'.$reports[$i]->records_id.'" d="'.$reports[$i]->description.'">
                                <img src="http://localhost/GB-convent/assets/image/feather-edit.svg" width="16px" alt=""></a>
                            <span class="tooltips">Edit</span>
                        </li>
                        <li class="tool tool-delete">
                            <a href="javascript:void(0)" type="submit" class="delete-btn">
                                <img src="http://localhost/GB-convent/assets/image/feather-trash.svg" width="16px" alt="">
                            </a>
                        </li>
                    </ul></td>
                    </tr>';
                
            }

            $profile= '<div class="stuedent-img">'.((($students->profile_picture==NULL)==true) ?'<img class="student-img" src="image/profile_picture/download.png" />':
            '<img class="student-img" src="image/profile_picture/' . $students->profile_picture .'"/>').'</div>';
            $arr = array('students'=>$students,'students_id'=>$student,'amount'=>$amount,'class'=>$class,'sessions'=>$sessions,'record_id'=>$record_id,'session_id'=>$session_id,'r'=>$r,'table'=>$table,'profile'=>$profile);
            echo json_encode($arr); 
           
        } 
        else {
            $arr=["message"=>"first fill fees details of $class" ,"success"=>0];
            echo json_encode($arr); 
            
        }
    
    }
}
