<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>
<body>
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
      <div class="page-inr">
         <div class="result-main">
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
                                            <input type="text" value=" {{$students->name}}">
                                          </span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">Class</label>
                                            <span>
                                          <input type="text" value="">
                                          </span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">to transfer</label>
                                            <span>
                                            <input type="text">
                                            </span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">section</label>
                                         <span>
                                         <input type="text">
                                         </span>
                                       </div>
                                    </td>
                                    <td colspan="3">
                                       <div class="d-flex">
                                          <label for="">Date of Birth</label>
                                            <span>
                                            <input type="text" value=" {{$students->dob}}">
                                            </span>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="d-flex">
                                          <label for="">Roll No</label>
                                            <span>
                                            <input type="text" value=" {{$students->student_id}}">
                                            </span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="3">
                                       <div class="d-flex">
                                          <label for="">Mother's Name</label>
                                            <span>
                                            <input type="text" value=" {{$students->mother_name}}">
                                            </span>
                                       </div>
                                    </td>
                                    <td colspan="2">
                                       <div class="d-flex">
                                          <label for="">Father's Name</label>
                                            <span>
                                            <input type="text" value=" {{$students->father_name}}">
                                            </span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="5">
                                       <div class="d-flex">
                                          <label for="">Residential address and Telephone no</label>
                                            <span>
                                            <input type="text" value=" {{$students->address}}, {{$students->mobile_no}}">
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
                                       <input type="text" class="" name="" value="">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e1" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td>
                                       Panculity
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
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
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e2" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td>
                                       Regularity
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
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
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e3" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td>
                                       Neat & Clean
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
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
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm1" name="term1e4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e4" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td>
                                       Discipline
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
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
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e5" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td>
                                      Attentive in class
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
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
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e6" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td>
                                       Participate in Act
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
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
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       50
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm2" name="term2e7" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       100
                                    </td>
                                    <td class="max-25">
                                       <input type="text" class="subm3" name="term3e7" value="">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td>
                                       Maintain B&C+
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                       Total
                                    </td>
                                    <td class="max-25">
                                       <input type="text">
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
         </div>
      </div>
      
   </div>
</section>
</body>
</html>