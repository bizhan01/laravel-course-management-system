<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\SubjectCategory;
use App\Subject;
use App\Student;
use App\Attendance;

class SubjectController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }


    public function addSubject() {
    	$teachers = Teacher::all();
    	$sb_cat = SubjectCategory::all();
    	return view('subject.addSubject', [
    		'teachers' => $teachers,
    		'sb_cat' => $sb_cat
    	]);
    }

    public function saveSubject(Request $req) {
    	$this->validate($req, [
    		'name' => 'required|string',
    		'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif',
            'category' => 'required'
    	], [
    		'name.required' => 'نام الزامی است',
    		'photo.image' => 'فایل باید از نوع عکس باشد',
    		'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
    		'photo.uploaded' => 'عکس قابل آپلود نیست',
            'category.required' => 'دسته بندی انتخاب نشده'
    	]);

        $photo_name = '';
		if($image = $req->file('photo')){
			$photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
			$image -> move("UploadedImages/subject", $photo_name);
        }
        else {
          $photo_name = 'noImg.png';# code...
        }

    	$subject = new Subject();
    	$subject->name = $req->name;
    	$subject->description = $req->description;
    	$subject->photo = $photo_name;
        $subject->cat_id = $req->category;

    	try {
    		$subject->save();
            session()->flash('success', 'موفقانه ثبت شد');
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    public function subjectList() {
    	$subjects = DB::table('subject_categories as sc')
    		->join('subjects as s', 's.cat_id', 'sc.id')
    		->select('s.*', 'sc.name as category')
    		->orderBy('sc.name')
    		->get();
    	return view('subject.subjectList', [
    		'subjects' => $subjects
    	]);
    }

    public function deleteSubject($id='') {
    	if ($id == '') {
			return back();
    	}
    	else {
    		$s = Subject::FindOrFail($id);
            if(file_exists('UploadedImages/subject/'.$s->photo) AND !empty($s->photo)) {
                unlink('UploadedImages/subject/'.$s->photo);
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

    public function editSubject($id=0) {
        if ($id == '') {
            return back();
        }
        else {
            $teachers = Teacher::all();
            $sb_cat = SubjectCategory::all();
            $subject = Subject::find($id)->toArray();
            return view('subject.editSubject', [
                'teachers' => $teachers,
                'sb_cat' => $sb_cat,
                'subject' => $subject
            ]);
        }
    }

    public function updateSubject(Request $req) {
        $id = $req->id;
        $this->validate($req, [
            'name' => 'required|string',
            'photo' => 'image|mimes:jpeg,jpeg,png,jpg,gif',
            'category' => 'required'
        ], [
            'name.required' => 'نام الزامی است',
            'photo.image' => 'فایل باید از نوع عکس باشد',
            'photo.mimes' => 'فارمت به فامت های jpeg,jpeg,png,jpg,gif باشد',
            'photo.uploaded' => 'عکس قابل آپلود نیست',
            'category.required' => 'دسته بندی انتخاب نشده'
        ]);

        $photo_name = '';
        if($image = $req->file('photo')){
            $photo_name = date('YmdHis') . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/subject", $photo_name);
        }

        $subject = Subject::find($id);
        $subject->name = $req->name;
        $subject->description = $req->description;
        if ($photo_name != '') {
            $subject->photo = $photo_name;
        }
        $subject->cat_id = $req->category;

        try {
            $subject->save();
            session()->flash('success', 'موفقانه ثبت شد');
            return back();
        } catch (Exception $e) {
            session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
            return back();
        }
    }
    public function subjectDetails($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $subject = Subject::find($id)->toArray();
            return view('subject.subjectDetails', [
                'subject' => $subject
            ]);
        }
    }


}
