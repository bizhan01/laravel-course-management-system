<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TeacherController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function addTeacher() {
    	return view('teacher.addTeacher');
    }

    // save teacher.
    public function saveTeacher(Request $req) {
        $config = [
            'table' => 'teachers',
            'length' => 4,
            'prefix' => date('y'),
            'reset_on_prefix_change' => true
        ];
        $teacher_id = IdGenerator::generate($config);
    	$this->validate($req, [
    		'name' => 'required|string',
    		'email' => 'nullable',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|',
        'tazkira' => 'image|mimes:jpeg,png,jpg,gif|',
    		'warranty' => 'image|mimes:jpeg,png,jpg,gif|'
    	], [
        		'name.required' => 'نام الزامی است',
        		'email' => 'فارمت ایمیل نادرست است',
        		'photo.image' => 'فایل باید از نوع عکس باشد',
        		'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
        		'photo.max' => 'سایز عکس بزرگ است',
        		'photo.uploaded' => 'عکس قابل آپلود نیست',
            'tazkira.image' => 'فایل باید از نوع کاپی تذکره باشد',
            'tazkira.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
            'tazkira.max' => 'سایز کاپی تذکره بزرگ است',
            'tazkira.uploaded' => 'کاپی تذکره قابل آپلود نیست',
            'warranty.image' => 'فایل باید از نوع ضمانت خط باشد',
            'warranty.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
            'warranty.max' => 'سایز ضمانت خط بزرگ است',
            'warranty.uploaded' => 'ضمانت خط قابل آپلود نیست'
    	]);

        $photo_name = '';
		if($image = $req->file('photo')){
			$photo_name = 'IMG-'.date('YmdHis') . '.' . $image-> getClientOriginalExtension();
			$image -> move("UploadedImages/teacher", $photo_name);
        }
        $warranty = '';
        if($image = $req->file('tazkira')){
            $warranty = 'W-'.date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/teacher", $warranty);
        }
        $tazkira = '';
        if($image = $req->file('warranty')){
            $tazkira = 'T-'.date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/teacher", $tazkira);
        }

    	$teacher = new Teacher();

        $teacher->id = $teacher_id;
      	$teacher->full_name = $req->name;
      	$teacher->father_name = $req->f_name;
      	$teacher->phone = $req->phone;
        $teacher->email = $req->email;
      	$teacher->tazkira_no = $req->tazkira_no;
      	$teacher->main_address = $req->main_address;
      	$teacher->current_address = $req->current_address;
        $teacher->photo = $photo_name;
        $teacher->tazkira = $tazkira;
    	  $teacher->warranty = $warranty;

    	try {
    		$teacher->save();
    		session()->flash('success', 'موفقانه ثبت شد');
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    public function teacherList() {
        $teachers = Teacher::all();
    	return view('teacher.teacherList', [
            'teachers' => $teachers
        ]);
    }

    public function editTeacher($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $teacher = Teacher::find($id)->toArray();
            return view('teacher.editTeacher', [
                'teacher' => $teacher
            ]);
        }
    }

    public function updateTeacher(Request $req) {
        $this->validate($req, [
            'name' => 'required|string',

        ], [
            'name.required' => 'نام الزامی است',
            'email' => 'فارمت ایمیل نادرست است',
            'photo.image' => 'فایل باید از نوع عکس باشد',
            'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
            'photo.max' => 'سایز عکس بزرگ است',
            'photo.uploaded' => 'عکس قابل آپلود نیست'
        ]);

        $photo_name = '';
        if($image = $req->file('photo')){
            $photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/teacher", $photo_name);
        }

        $warranty = '';
        if($image = $req->file('tazkira')){
            $warranty = 'W-'.date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/teacher", $warranty);
        }

        $tazkira = '';
        if($image = $req->file('warranty')){
            $tazkira = 'T-'.date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/teacher", $tazkira);
        }

        $teacher = Teacher::find($req->id);

        $teacher->full_name = $req->name;
        $teacher->father_name = $req->f_name;
        $teacher->phone = $req->phone;
        $teacher->email = $req->email;
        $teacher->main_address = $req->main_address;
        $teacher->current_address = $req->current_address;
        $teacher->tazkira_no = $req->tazkira_no;
        if ($photo_name != '') {
            $teacher->photo = $photo_name;
        }

        if ($tazkira != '') {
            $teacher->tazkira = $tazkira;
        }

        if ($warranty != '') {
            $teacher->warranty = $warranty;
        }

        try {
            $teacher->save();
            session()->flash('success', 'موفقانه ثبت شد');
            return back();
        } catch (Exception $e) {
            session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
            return back();
        }
    }


    public function deleteTeacher($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $s = Teacher::FindOrFail($id);
            if(file_exists('UploadedImages/teacher/'.$s->photo) AND !empty($s->photo)) {
                unlink('UploadedImages/teacher/'.$s->photo);
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
}
