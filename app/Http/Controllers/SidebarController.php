<?php

namespace App\Http\Controllers;
use App\Models\Student_classe;
use App\Models\Payment;
use App\Models\Repayment;
use App\Models\Record;
use App\Models\Year;
use App\Models\Student;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function YearData(Request $request,$id){
        $year= Year::get();
        $allclass= Student_classe::get(); 
       
        $tests =Record::where("session","=",$id)->get();
         foreach($year as $y){
            if($y->status==1){
                $y_name=$y->years;
                $y_id=$y->id;
            }
        }
        $b=array();
        foreach($tests as $t){
            $a=$t->students_id;
            $students = Student::where("id","=", $a)->get();
            foreach($students as $s){
                array_push($b,$s);
               }
        }

        return view('admin.sidebar.years',compact("b","tests","y_id","year","y_name","allclass"));
    }
    public function extraPay(){
        $students =Payment::get();
        $class = Student_classe::get(); 
        return view ('admin.extra.index',compact("class","students"));
    }

    public function extraStore(Request $request){

        $payments = new Payment;
        $payments->name = $request->name;
        $payments->fname = $request->father_name;
        $payments->mname = $request->mother_name;
        $payments->class = $request->class_name;
        $payments->price = 0;
        $payments->save();
       
            
        $arr=["msg"=>"student added","status"=>"succes"];
         echo json_encode($arr); 
     }
     public function showDetails(Request $request){
        $id=$request->id;
        $old=$request->old;
        $student =Payment::find($id);

       
        $gave = Repayment::where("payments_id", "=", $id)->sum('gave_amount');
        $take = Repayment::where("payments_id", "=", $id)->sum('take_amount');
        $due=$gave-$take;

        $arr=["student"=>$student,"gave"=>$old,"take"=>$take,"due"=>$due];
        echo json_encode($arr); 
         
    }
    public function addPayment(Request $request){
        $id=$request->id;
        $old_price=$request->old_price;
        $c_price=$request->price;
        $result=$old_price + $c_price;
        $payments =Payment::find($id);
        $payments->price=$result;
        $payments->update();

        $repayments = new Repayment;
        $repayments->payments_id = $id; 
        $repayments->gave_amount = $c_price;
        $repayments->details = $request->detail;
        $repayments->date = $request->date;
        $repayments->take_amount =0;
        $repayments->save();

        
        $gave = Repayment::where("payments_id", "=", $id)->sum('gave_amount');
        $take = Repayment::where("payments_id", "=", $id)->sum('take_amount');
        $due=$gave-$take;

        $arr=["msg"=>"payment success","gave"=>$result,"due"=>$due];
        echo json_encode($arr); 
        // return  response()->json( $payments);
    }

    public function subpayment(Request $request){
        $id=$request->id;
        $old_price=$request->old_price;
        $c_price=$request->price;
        $result=$old_price - $c_price;
        $payments =Payment::find($id);
        $payments->price=$result;
        $payments->update();

        $repayments = new Repayment;
        $repayments->payments_id = $id; 
        $repayments->take_amount = $c_price;
        $repayments->details = $request->detail;
        $repayments->date = $request->date;
        $repayments->gave_amount =0;
        $repayments->save();
        $gave = Repayment::where("payments_id", "=", $id)->sum('gave_amount');
        $take = Repayment::where("payments_id", "=", $id)->sum('take_amount');
        $due=$gave-$take;

        $arr=["msg"=>"payment taken success","gave"=>$result,"due"=>$result];
        echo json_encode($arr); 
        
        
        // return  response()->json( $payments);
    }
}
