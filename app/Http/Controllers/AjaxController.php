<?php

namespace App\Http\Controllers;

use App\Models\Gb;
use App\Models\Student;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function getdata(request $request)
    {
        $i = 0;

        $id = $_GET['id'];
       
        $students = Student::where("gbs_id", "=", $id)->get();
        $tests = Gb::where("id", "=", $id)->first();

        $a = $students->count();

        for ($i = 0; $i < $a; $i++) { ?>

            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $students[$i]->student_id; ?></td>
                <td><img class="student-img" src="image/profile_picture/<?php echo $students[$i]->profile_picture; ?>"/> </td>
                <td><?php echo $students[$i]->name; ?></td>
                <td><?php echo $students[$i]->scholar_no; ?></td>
                <td><?php echo $tests->class_name ?></td>
                <td><?php echo $students[$i]->father_name; ?></td>
                <td><?php echo $students[$i]->mother_name; ?></td>
                <td><?php echo $students[$i]->dob; ?></td>
                <td><?php echo $students[$i]->address; ?></td>
                <td><?php echo $students[$i]->aadhar_no; ?></td>
                <td><?php echo $students[$i]->samarg_id; ?></td>
                <td><?php echo $students[$i]->mobile_no; ?></td>
                <td><?php echo $students[$i]->mobile_no2; ?></td>
                <td><?php echo $students[$i]->account_no; ?></td>
                <td><?php echo $students[$i]->add_session; ?></td>
                <td>
                    <div class="d-flex">
                        <button class="edit-btn">
                            <a href="<?php echo  route('students.edit', $students[$i]->id) ?>">
                                <img src="<?php echo url('/'); ?>/assets/image/Icon-edit.svg" width="16px"></a>
                        </button>

                        <button type="submit" class="delete-btn student-delete" data-id="<?php echo $students[$i]->id; ?>" data-name="<?php echo $students[$i]->name; ?>">
                            <img src="<?php echo url('/'); ?>/assets/image/Icon-delete.svg" width="16px">
                        </button>
                    </div>
                </td>
            </tr>
<?php }
    }
}
?>
