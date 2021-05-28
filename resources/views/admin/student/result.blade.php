@extends('layouts.adminlayout')
@section('content')
<style>
   .result-main label {
      min-width: max-content;
   text-align: left;
   }
   .result-main input {
   border: 0;
   padding: 0;
   }
   .result-main .progress-table input {
   border-bottom: 1px dotted #000;
   width: 100%;
   }
   .result-main .progress-table span {
   width: 100%;
   }
   td {
   text-align:center;
   }
   .max-25 input, .max-25 {
   width:25px;
   }
   .width-100 input {
   width:100px;
   }
</style>
<section class="main-wrapper">
   <div class="page-color">
      <div class="page-header">
         <div class="page-title">
            <h3><span>All Students</span></h3>
            <div class="user-drop-sec">
               <span class="c_session"><b><img src="{{url('/')}}/assets/image/sess.svg" alt=""></b> 2019-2020</span>
               <ul>
                  <li>
                     <a href="javascript:void(0)">
                        <i>
                        <img src="{{url('/')}}/assets/image/username.svg" class="menu-show" alt="">
                        </i>
                        <span>Hemendra</span>
                        <span class="drop-arrow">
                           <svg xmlns="http://www.w3.org/2000/svg" width="10.831" height="6.197" viewBox="0 0 10.831 6.197">
                              <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M13.113,11.6,17.2,7.51a.773.773,0,1,0-1.094-1.091l-4.632,4.629a.771.771,0,0,0-.023,1.065L16.1,16.774a.774.774,0,1,0,1.1-1.09Z" transform="translate(-6.172 17.445) rotate(-90)" fill="#000" />
                           </svg>
                        </span>
                     </a>
                     <ul>
                        <li>
                           <a href="{{ url('/logout') }}">
                           <i>
                           <img src="{{url('/')}}/assets/image/logout-01.svg" class="menu-show" alt="">
                           </i>
                           <span>Log Out</span>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="page-inr">
         <div class="result-main">
         <form method="post" id="result" action="{{url('/printresult')}}">
          @csrf 
            <table width="100%" border="0" cellpadding="5" cellspacing="0">
               <tr>
                  <td>
                     <table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tr>
                           <td>
                              <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                 <tr>
                                    <td>
                                       <img class="desk-show" src="http://nextige.com/GB-convent/assets/image/logo-blue.svg" alt="">
                                    </td>
                                    <td colspan="4">
                                       <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-head">
                                          <tr>
                                             <td colspan="2" align="center">
                                                <h3>
                                                   G.B Convent School Sutreti
                                                </h3>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td colspan="2" align="center">
                                                <span>
                                                Thandla 457777, Mobile- 
                                                </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td colspan="2" align="center">
                                                <span>
                                                Affiliated by Board of Eduction & Govt.MP
                                                </span>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td style="text-align:left;">
                                                <span>
                                                Reg.No.PS 57693
                                                </span>
                                             </td>
                                             <td style="text-align:right;">
                                                <span>
                                                Dise Code 232440410506
                                                </span>
                                             </td>
                                          </tr>
                                       </table>
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td>
                         
                              <table width="100%" border="0" cellpadding="5" cellspacing="25" class="progress-table">
                                 <tr>
                                    <td colspan="5" align="center">
                                       <h4>
                                          Progress Report 2019-20
                                       </h4>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="3">
                                       <div class="d-flex">
                                          <label for="">Name of Student</label>
                                          <span>
                                          <input type="hidden" name="student_id" value="{{$students->id}}">
                                            <input type="text" value=" {{$students->name}}">
                                          </span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">Class</label>
                                            <span>
                                          <input type="text" name="class_name" value=" {{$class_name}}">
                                          </span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">to transfer</label>
                                            <span>
                                            <input type="text" name="nextclass" value="">
                                            </span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">section</label>
                                         <span>
                                         <input type="text" name="section" value="">
                                         </span>
                                       </div>
                                    </td>
                                    <td colspan="3">
                                       <div class="d-flex">
                                          <label for="">Date of Birth</label>
                                            <span>
                                            <input type="text" name="dob" value=" {{$students->dob}}">
                                            </span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">Roll No</label>
                                            <span>
                                            <input type="text" name="student_id" value=" {{$students->student_id}}">
                                            </span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="3">
                                       <div class="d-flex">
                                          <label for="">Mother's Name</label>
                                            <span>
                                            <input type="text"  name="mother_name" value=" {{$students->mother_name}}">
                                            </span>
                                       </div>
                                    </td>
                                    <td colspan="2">
                                       <div class="d-flex">
                                          <label for="">Father's Name</label>
                                            <span>
                                            <input type="text" name="father_name" value=" {{$students->father_name}}">
                                            </span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="5">
                                       <div class="d-flex">
                                          <label for="">Residential address and Telephone no</label>
                                            <span>
                                            <input type="text" name="address" value=" {{$students->address}}, {{$students->mobile_no}}">
                                            </span>
                                       </div>
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <table width="100%" border="2" cellpadding="5" cellspacing="0" class="marks-table">
                                 <tr>
                                    <td rowspan="2">
                                       <b>Subject</b>
                                    </td>
                                    <td colspan="8">
                                       <b>Unit Test</b>
                                    </td>
                                    <td colspan="3">
                                       <b>I Term</b>
                                    </td>
                                    <td colspan="3">
                                       <b>II Term</b>
                                    </td>
                                    <td colspan="3">
                                       <b>III Term</b>
                                    </td>
                                    <td colspan="4">
                                       <b>Persnol Progress</b>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td class="max-25">MM</td>
                                    <td class="max-25">I</td>
                                    <td class="max-25">II</td>
                                    <td class="max-25">III</td>
                                    <td class="max-25">IV</td>
                                    <td class="max-25">V</td>
                                    <td class="max-25">VI</td>
                                    <td class="max-25">GR</td>
                                    <td class="max-25">MM</td>
                                    <td class="max-25">MO</td>
                                    <td class="max-25">GR</td>
                                    <td class="max-25">MM</td>
                                    <td class="max-25">MO</td>
                                    <td class="max-25">GR</td>
                                    <td class="max-25">MM</td>
                                    <td class="max-25">MO</td>
                                    <td class="max-25">GR</td>
                                    <td>Progress</td>
                                    <td class="max-25">I</td>
                                    <td class="max-25">II</td>
                                    <td class="max-25">III</td>
                                 </tr>
                                 <tr>
                                    <td>
                                       English Spacial
                                    </td>
                                    <td class="max-25">
                                       10
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject1" name="e1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject2" name="e2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject3" name="e3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject4" name="e4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject5" name="e5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject6" name="e6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="" name="e7" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text"  name="term1g1" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term2g1" value="">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term3g1" value="">
                                    </td>
                                    <td>
                                       Panculity
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="panculity1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="panculity2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="panculity3" value="">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                      Hindi General
                                    </td>
                                    <td class="max-25">
                                       10
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject1" name="h1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject2" name="h2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject3" name="h3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject4" name="h4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject5" name="h5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject6" name="h6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="" name="h7" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term1g2" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term2g2" value="">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term3g2" value="">
                                    </td>
                                    <td>
                                       Regularity
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="regularity1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="regularity2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="regularity3" value="">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                      Maths
                                    </td>
                                    <td class="max-25">
                                       10
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject1" name="m1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject2" name="m2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject3" name="m3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject4" name="m4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject5" name="m5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject6" name="m6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="" name="m7" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term1g3" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term2g3" value="">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term3g3" value=""> 
                                    </td>
                                    <td>
                                       Neat & Clean
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="neat1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="neat2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="neat3" value="">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                      Social Study / EVS
                                    </td>
                                    <td class="max-25">
                                       10
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject1" name="s1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject2" name="s2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject3" name="s3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject4" name="s4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject5" name="s5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject6" name="s6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="" name="s7" value="">
                                    </td>
                                    <td class="max-25" >
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term1g4" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term2g4" value="">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term3g4" value="">
                                    </td>
                                    <td>
                                       Discipline
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="discipline1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="discipline2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="discipline3" value="">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                      Computer / Science
                                    </td>
                                    <td class="max-25">
                                       10
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject1" name="c1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject2" name="c2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject3" name="c3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject4" name="c4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject5" name="c5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject6" name="c6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="" name="c7" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e5" value="">
                                    </td>
                                    <td class="max-25" >
                                       <input type="text" name="term1g5" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term2g5" value="">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term3g5" value="">
                                    </td>
                                    <td>
                                      Attentive in class
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="attentive1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="attentive2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="attentive3" value="">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                      Drawing / Project / Sanskrit
                                    </td>
                                    <td class="max-25">
                                       10
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject1" name="d1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject2" name="d2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject3" name="d3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject4" name="d4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject5" name="d5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject6" name="d6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="" name="d7" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term1g6" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term2g6" value="">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term3g6" value="">
                                    </td>
                                    <td>
                                       Participate in Act
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="act1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="act2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="act3" value="">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       GK/Conv.
                                    </td>
                                    <td class="max-25">
                                       10
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject1" name="g1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject2" name="g2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject3" name="g3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject4" name="g4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject5" name="g5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subject6" name="g6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="" name="g7" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e7" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term1g7" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e7" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term2g7" value="">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e7" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="term3g7" value="">
                                    </td>
                                    <td>
                                       Maintain B&C+
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="maintain1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="maintain2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="maintain3" value="">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       Total
                                    </td>
                                    <td class="max-25">
                                       <input type="text" name="testtotal" >
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total1" name="total1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total2" name="total2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total3" name="total3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total4" name="total4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total5" name="total5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total6" name="total6" value="">
                                    </td>
                                    <td>
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="totalm" id="marks" name="totalmarks" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total7" class="totalm" name="" value="">
                                    </td>
                                    <td>
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total8" name="" value="">
                                    </td>
                                    <td>
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text" id="total9" name="" value="">
                                    </td>
                                    <td>
                                    </td>
                                    <td colspan="4" rowspan="4" style="vertical-align:top">
                                       Teacher Remarks
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Percentage
                                    </td>
                                    <td colspan="8">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text" id="percent">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Result
                                    </td>
                                    <td colspan="8">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text" >
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Rank
                                    </td>
                                    <td colspan="8">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Attendance
                                    </td>
                                    <td colspan="8">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                    <td colspan="3" class="width-100">
                                       <input type="text">
                                    </td>
                                    <td rowspan="5" colspan="4" style="vertical-align:top">
                                       Principal
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Sign.of.Teacher
                                    </td>
                                    <td colspan="8">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Sign.of.Teacher
                                    </td>
                                    <td colspan="8">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Sign.of.Principal
                                    </td>
                                    <td colspan="8">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td >
                                       Sign.of.Parents
                                    </td>
                                    <td colspan="8">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                    <td colspan="3">
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                     </table>
                  </td>
               </tr>
            </table>
            <input type="submit" name="save" class="add-btn" id="save" value="Print Result">
          
         </form>
         </div>
      </div>
      
   </div>
</section>
@endsection
@section('additionalscripts')
@endsection