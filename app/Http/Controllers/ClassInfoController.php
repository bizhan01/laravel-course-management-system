<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassInfo;
use App\Student;

class ClassInfoController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    // add student to class.
    public function addStudentToClas(Request $req) {
    	$this->validate($req, [
    		'student_id' => 'required',
    		'class_id' => 'required'
    	], [
    		'student_id.required' => 'شاگرد انتخاب نشده',
    		'class_id.required' => 'صنف انتخاب نشده'
    	]);
    	$class_info = new ClassInfo();
    	$class_info->class_id = $req->class_id;
    	$class_info->student_id = $req->student_id;
    	$class_info->present = 0;
    	$class_info->absent = 0;
    	$class_info->score = 0;
    	try {
    		$class_info->save();
    		session()->flash('success', 'موفقانه ثبت شد');
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ثبت نشد! لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    // update absent, present, score.
    public function updateStudentInfo(Request $req) {
        $this->validate($req, [
            'ids' => 'required',
        ], [
            'ids.required' => 'هیچ موردی انتخاب نشده'
        ]);
        $idArray = $req->ids;
        $presentArray = $req->present;
        $absentArray = $req->absent;
        $scoreArray = $req->score;
        $flag = 0;
        for ($i=0; $i < count($idArray); $i++) { 
            if($presentArray[$i] != null || $presentArray[$i] != '') {
                ClassInfo::where('student_id', $idArray[$i])
                    ->where('class_id', $req->class_id)
                    ->update([
                        'present' => $presentArray[$i],
                        'absent' => $absentArray[$i],
                        'score' => $scoreArray[$i]
                    ]);
                    $flag = 1;
            }
        }
        if ($flag == 1) {
        	session()->flash('success', 'موفقانه ثبت شد.');
        }
        else {
        	session()->flash('failed', 'ثبت نشد! لطفا دوباره کوشش کنید');
        }
        return back(); 
    }

    // delete student from class.
    public function deleteStudentFromClass($id='') {
    	if ($id == '') {
    		return back();
    	} else {
    		try {
    			ClassInfo::find($id)->delete();
    			session()->flash('success', 'موفقانه حذف شد');
    			return back();
    		} catch (Exception $e) {
    			session()->flash('failed', 'حذف نشد! لطفا دوباره کوشش کنید.');
    			return back();
    		}
    	}
    }
}
