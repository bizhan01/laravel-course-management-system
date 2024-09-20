<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Subject;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StudentController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function addStudent() {
        $subjects = Subject::all();
    	return view('student.addStudent', [
            'subjects' => $subjects
        ]);
    }

    // save student
    public function saveStudent(Request $req) {
        $config = [
            'table' => 'students',
            'length' => 6,
            'prefix' => date('y'),
            'reset_on_prefix_change' => true
        ];
        $student_id = IdGenerator::generate($config);
    	$this->validate($req, [
    		'name' => 'required|string',
    		'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
    	], [
    		'name.required' => 'نام الزامی است',
    		'photo.image' => 'فایل باید از نوع عکس باشد',
    		'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
    		'photo.max' => 'سایز عکس بزرگ است',
    		'photo.uploaded' => 'عکس قابل آپلود نیست'
    	]);

        $photo_name = '';
		if($image = $req->file('photo')){
			$photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
			$image -> move("UploadedImages/student", $photo_name);
        }

    	$student = new Student();
        $student->id = $student_id;
        $student->full_name = $req->name;
    	$student->father_name = $req->f_name;
    	$student->phone = $req->phone;
    	$student->parent_phone = $req->parent_phone;
    	$student->photo = $photo_name;

    	try {
    		$student->save();
            session()->flash('success', 'موفقانه ثبت شد');
    		session()->flash('student_id', $student_id);
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    public function studentList() {
        $students = Student::all();
        return view('student.studentList', [
            'students' => $students
        ]);
    }

    public function deleteStudent($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $s = Student::FindOrFail($id);
            if(file_exists('UploadedImages/student/'.$s->photo) AND !empty($s->photo)) {
                unlink('UploadedImages/student/'.$s->photo);
            }
            try{
                $s->delete();
                session()->flash('success', 'موفقانه حذف شد');
                return back();
            }
            catch(\Exception $e){
                $bug = $e->errorInfo[1];
                session()->flash('failed', 'حذف نشد لطفا دوباره کوشش کنید');
                return back();
            }

        }
    }

    public function studentDetails($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $calsInfo = DB::table('class_infos as ci')
                ->join('clas as c', 'c.id', 'ci.class_id')
                ->join('students as std', 'std.id', 'ci.student_id')
                ->join('subjects as s', 's.id', 'c.subject_id')
                ->select('ci.*', 's.name as subjectName', 'c.year as year', 'c.month as month', 'c.day as day')
                ->where('std.id', $id)
                ->get();
            $student = Student::find($id)->toArray();

            $feeInfo = DB::table('students as std')
              ->join('fees as fee', 'std.id', 'fee.student_id')
              ->where('std.id', $id)
              ->get();

            return view('student.studentDetails', [
                'student' => $student,
                'calsInfo'=> $calsInfo,
                'feeInfo'=> $feeInfo
            ]);
        }
    }

    public function editStudent($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $subjects = Subject::all();
            $student = Student::find($id)->toArray();
            return view('student.editStudent', [
                'subjects' => $subjects,
                'student' => $student
            ]);
        }
    }

    public function updateStudent(Request $req) {
        $this->validate($req, [
            'name' => 'required|string',
            'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif'
        ], [
            'name.required' => 'نام الزامی است',
            'photo.image' => 'فایل باید از نوع عکس باشد',
            'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
            'photo.max' => 'سایز عکس بزرگ است',
            'photo.uploaded' => 'عکس قابل آپلود نیست'
        ]);

        $photo_name = '';
        if($image = $req->file('photo')){
            $photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/student", $photo_name);
        }

        $student = Student::find($req->id);

        $student->full_name = $req->name;
        $student->father_name = $req->f_name;
        $student->phone = $req->phone;
        $student->parent_phone = $req->parent_phone;
        if ($photo_name != '') {
            $student->photo = $photo_name;
        }

        try {
            $student->save();
            session()->flash('success', 'موفقانه ثبت شد');
            return back();
        } catch (Exception $e) {
            session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
            return back();
        }
    }


}
