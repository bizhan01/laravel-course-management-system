<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Employee;
use App\User;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $employees = Employee::all();

      return view('employee.employees', compact('employees'));
    }

    public function contacts()
    {
       $employees = Employee::all();
      return view('employee.contacts', compact('employees'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('employee.addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      $config = [
        'table' => 'employees',
        'length' => 4,
        'prefix' => date('y'),
        'reset_on_prefix_change' => true
      ];
      $id = IdGenerator::generate($config);
      $this->validate(request(),[
        'fullName'=>'required',
        'position'=>'required',
        'dob' => 'required',
        'phone1' =>'required',
        'phone2' => 'nullable',
        'email' => 'nullable',
        'province1' =>'required',
        'district1' => 'required',
        'region1' => 'required',
        'province2' => 'required',
        'district2' => 'required',
        'region2' => 'required',
        'profileImage' =>'image|mimes:jpeg,jpeg,png,jpg,gif',
        'tazkira' => 'image|mimes:jpeg,jpeg,png,jpg,gif',
        'warranty' => 'image|mimes:jpeg,jpeg,png,jpg,gif',

    ]);
    if($image = $request->file('profileImage')){
      $new_name =rand() . '.' . $image-> getClientOriginalExtension();
      $image -> move(public_path("UploadedImages"), $new_name);
    }
    else {
      $new_name = 'about.png';
    }

    if($image = $request->file('tazkira')){
      $new_name2 =rand() . '.' . $image-> getClientOriginalExtension();
      $image -> move(public_path("UploadedImages"), $new_name2);
    }
    else {
      $new_name2 = 'about.png';
    }

    if($image = $request->file('warranty')){
      $new_name3 =rand() . '.' . $image-> getClientOriginalExtension();
      $image -> move(public_path("UploadedImages"), $new_name3);
    }
    else {
      $new_name3 = 'about.png';
    }
    Employee::create([
        'id' => $id,
        'fullName' => request('fullName'),
        'position' => request('position'),
        'dob' => request('dob'),
        'phone1' => request('phone1'),
        'phone2' => request('phone2'),
        'email' => request('email'),
        'province1' => request('province1'),
        'district1' => request('district1'),
        'region1' => request('region1'),
        'province2' => request('province2'),
        'district2' => request('district2'),
        'region2' => request('region2'),
        'profileImage' => $new_name,
        'tazkira' => $new_name2,
        'warranty' => $new_name3,
        'created_at'=>carbon::now(),
        'updated_at'=>carbon::now(),

      ]);

      try {
      session()->flash('success', 'علمیات موافقانه انجام شد');
      return back();
      } catch(Exception $ex) {
      session()->flash('failed', 'خطا! دوباره کوشش کنید');
      return back();
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('test');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.editEmployee',compact('employee',$employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //Validate
        $request->validate([
            'fullName' => 'required',
            'position' => 'required',
        ]);

        if($image = $request->file('profileImage')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name);
        }
        else {
          $new_name = 'about.png';
        }

        if($image = $request->file('tazkira')){
          $new_name2 =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name2);
        }
        else {
          $new_name2 = 'about.png';
        }

        if($image = $request->file('warranty')){
          $new_name3 =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name3);
        }
        else {
          $new_name3 = 'about.png';
        }


        $employee->fullName = $request->fullName;
        $employee->position = $request->position;
        $employee->dob = $request->dob;
        $employee->phone1 = $request->phone1;
        $employee->phone2 = $request->phone2;
        $employee->email = $request->email;
        $employee->province1 = $request->province1;
        $employee->district1 = $request->district1;
        $employee->region1 = $request->region1;
        $employee->province2 = $request->province2;
        $employee->district2 = $request->district2;
        $employee->region2 = $request->region2;
        $employee->profileImage = $request->profileImage;
        $employee->tazkira = $request->tazkira;
        $employee->warranty = $request->warranty;
        $employee->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employee $employee)
    {
        $employee->delete();
        return redirect('/employees');
    }

    public function employeeDetails($id='') {
    $employee = Employee::find($id)->toArray();
      return view('employee.employeeDetails', [
        'employee' => $employee
      ]);
    }


    public function deleteEmployee($id='') {
        if ($id == '') {
            return back();
        }
        else {
            $s = Employee::FindOrFail($id);
            if(file_exists('UploadedImages/emploee/'.$s->photo) AND !empty($s->photo)) {
                unlink('UploadedImages/emploee/'.$s->photo);
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
