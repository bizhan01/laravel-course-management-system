<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectCategory;

class SubjectCategoryController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function addSubCat() {
    	$sc_list = SubjectCategory::all();
    	return view('subject_category.addSubCat', [
    		'sc_list' => $sc_list
    	]);
    }

    public function saveSubjectCat(Request $req) {
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
			$image -> move("UploadedImages", $photo_name);
        }
        else {
          $photo_name = 'noImg.png';# code...
        }

    	$sc = new SubjectCategory();

    	$sc->name = $req->name;
    	$sc->description = $req->description;
    	$sc->photo = $photo_name;

    	try {
    		$sc->save();
    		session()->flash('success', 'موفقانه ثبت شد');
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }

    // delete subject category.
    public function deleteSubCat($id=0) {
    	if ($id == '') {
			return back();
    	}
    	else {
    		$sc = SubjectCategory::FindOrFail($id);
            if(file_exists('UploadedImages/'.$sc->photo) AND !empty($sc->photo)) {
                unlink('UploadedImages/'.$sc->photo);
            }
            try{
                $sc->delete();
                session()->flash('success', 'موافقانه حذف شد');
                return redirect(route('addSubCat'));
            }
            catch(\Exception $e){
                $bug = $e->errorInfo[1];
                session()->flash('failed', 'حذف نشد لطفا دوباره کوشش کنید');
                return redirect(route('addSubCat'));
            }

    	}
    }

    public function editSubjectCategory($id=0) {
        if ($id == '' || $id == null || $id == 0) {
            return back();
        }
        else {
            $sc_list = SubjectCategory::all();
            $subject_category = SubjectCategory::find($id)->toArray();
            return view('subject_category.editSubjectCategory', [
                'sc_list' => $sc_list,
                'subject_category' => $subject_category
            ]);
        }
    }

    public function updateSubjectCat(Request $req) {
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
            $image -> move("UploadedImages", $photo_name);
        }

        $sc = SubjectCategory::find($req->id);

        $sc->name = $req->name;
        $sc->description = $req->description;
        if ($photo_name != '') {
            $sc->photo = $photo_name;
        }

        try {
            $sc->save();
            session()->flash('success', 'تغیرات اعمال شد');
            return redirect(route('addSubCat'));
        } catch (Exception $e) {
            session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
            return back();
        }
    }
}
