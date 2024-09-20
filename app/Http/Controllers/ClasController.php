<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Teacher;
use App\Subject;
use App\Clas;
use App\Student;
use App\ClassInfo;



class ClasController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function addClas() {
    	$teachers = Teacher::all();
    	$subjects = Subject::all();
    	return view('clas.addClas', [
    		'teachers' => $teachers,
    		'subjects' => $subjects
    	]);
    }

    // save calss.
    public function saveClas(Request $req) {
    	$this->validate($req, [
    		'name' => 'required|string',
            'teacher' => 'required',
            'subject' => 'required',
            'description' => 'max:190'
    	], [
    		'name.required' => 'نام الزامی است', 
            'teacher.required' => 'استاد را انتخاب نشده',
            'subject.required' => 'مضمون انتخاب نشده',
            'description.max' => 'توضیحات نباید بیشتر از ۱۹۰ حرف باشد'
    	]);
    	$clas = new Clas();
    	$clas->name = $req->name;
    	$clas->fee = $req->fee;
    	$clas->discount = $req->discount;
        $clas->start_time = $req->start_time;
    	$clas->end_time = $req->end_time;
        $clas->year = $req->year;
        $clas->month = $req->month;
        $clas->day = $req->day;
    	$clas->status = $req->status;
    	$clas->description = $req->description;
    	$clas->subject_id = $req->subject;
        $clas->teacher_id = $req->teacher;
    	try {
    		$clas->save();
            session()->flash('success', 'موفقانه ثبت شد');
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    // class list.
    public function clases($y = '', $m = '') {
    	$dates = Clas::all();

    	if ($y != '' && $m != '') {
    		$clases = DB::table('clas as c')
    		->join('teachers as t', 't.id', 'c.teacher_id')
    		->select('c.*', 't.full_name as teacher')
    		->where('year', $y)
    		->where('month', $m)
    		->orderBy('c.id', 'desc')
    		->get();
    		session()->flash('year', $y);
    		session()->flash('month', $m);
    	} 
    	else if ($y != '') {
    	   	$clases = DB::table('clas as c')
    		->join('teachers as t', 't.id', 'c.teacher_id')
    		->select('c.*', 't.full_name as teacher')
    		->where('year', $y)
    		->orderBy('c.id', 'desc')
    		->get();
    		session()->flash('year', $y);
    		session()->flash('month', $m);	
    	}
    	else if ($m != '') {
    		$clases = DB::table('clas as c')
    		->join('teachers as t', 't.id', 'c.teacher_id')
    		->select('c.*', 't.full_name as teacher')
    		->where('month', $m)
    		->orderBy('c.id', 'desc')
    		->get();
    		session()->flash('year', $y);
    		session()->flash('month', $m);
    	}
    	else {
    		$clases = DB::table('clas as c')
    		->join('teachers as t', 't.id', 'c.teacher_id')
    		->select('c.*', 't.full_name as teacher')
        	->whereYear('c.created_at', Carbon::now())
    		->orderBy('c.id', 'desc')
    		->get();
    	}
    	return view('clas.clases', [
    		'clases' => $clases,
    		'dates' => $dates,
    	]);
    }

    // delete class.
    public function deleteClas($id='') {
    	if ($id != '') {
    		try {
    			Clas::find($id)->delete();
    			session()->flash('success', 'موفقانه حذف شد.');
    			return back();
    		} catch (Exception $e) {
    			session()->flash('success', 'موفقانه حذف شد.');
    			return back();
    		}
    	}else {
    		return back();
    	}
    }


    // class details.
    public function clasDetails($id='') {
    	if ($id == '') {
            return back();
        }
        else {
            $clases = Clas::find($id)->toArray();
            $teacher = DB::table('clas as c')
                ->join('teachers as t', 't.id', 'c.teacher_id')
                ->select('t.full_name as teacher_name')
                ->where('c.id', $id)
                ->get();
            $students = DB::table('class_infos as ci')
            	->join('clas as c', 'c.id', 'ci.class_id')
                ->join('students as std', 'std.id', 'ci.student_id')
                ->select('ci.*', 'std.id as studentId', 'std.full_name as studentName', 'std.father_name as studentFName', 'std.photo as studentPhoto')
                ->where('c.id', $id)
                ->orderBy('std.id')
                ->get();
            $allStudents = Student::all();
            return view('clas.clasDetails', [
                'clases' => $clases,
                'teacher' => $teacher,
                'students' => $students,
                'allStudents' => $allStudents
            ]);
        }
    }

    // edit class.
    public function editClass($id='') {
    	if ($id == '') {
            return back();
        }
        else {
        	$teachers = Teacher::all();
	    	$subjects = Subject::all();
	    	$clases = Clas::find($id)->toArray();
	    	return view('clas.editClass', [
	    		'teachers' => $teachers,
	    		'subjects' => $subjects,
	    		'clases' => $clases
    		]);
        }
    } 

    // update class.
    public function updateClas(Request $req) {
       	$this->validate($req, [
    		'name' => 'required|string',
            'teacher' => 'required',
            'subject' => 'required',
            'description' => 'max:190'
    	], [
    		'name.required' => 'نام الزامی است', 
            'teacher.required' => 'استاد را انتخاب نشده',
            'subject.required' => 'مضمون انتخاب نشده',
            'description.max' => 'توضیحات نباید بیشتر از ۱۹۰ حرف باشد'
    	]);
    	$clas = Clas::find($req->id);
    	$clas->name = $req->name;
    	$clas->fee = $req->fee;
    	$clas->discount = $req->discount;
        $clas->start_time = $req->start_time;
    	$clas->end_time = $req->end_time;
        $clas->year = $req->year;
        $clas->month = $req->month;
        $clas->day = $req->day;
    	$clas->status = $req->status;
    	$clas->description = $req->description;
    	$clas->subject_id = $req->subject;
        $clas->teacher_id = $req->teacher;
    	try {
    		$clas->save();
            session()->flash('success', 'موفقانه ثبت شد');
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}

    }
}