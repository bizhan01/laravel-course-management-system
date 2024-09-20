<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Fee;
use App\Clas;
use App\Student;
use DB;


class FeeController extends Controller
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
      $fees = DB::table('students as std')
            ->rightJoin('fees as fee', 'std.id', '=', 'fee.student_id')
            ->whereDate('fee.created_at', Carbon::today())
            ->orderByRaw('(fee.id)desc LIMIT 1')
            ->get();
      $classes = Clas::all();
      $students = Student::latest()->get();
      return view('fees.fee', compact('fees', 'classes', 'students'));
    }


    public function fees($from='', $to='') {
      $fees = '';
      if ($from == '' && $to == '') {
        $fees = DB::table('students as std')
              ->rightJoin('fees as fee', 'std.id', '=', 'fee.student_id')
              ->get();
      } else {
        $fees = DB::table('students as std')
              ->rightJoin('fees as fee', 'std.id', '=', 'fee.student_id')
              ->whereBetween('fee.created_at', [$from, $to])
              ->get();
      }

      return view('fees.feeList', compact('fees'));
    }

    public function notPaid()
    {
      // $fees = Fee::all();
      //
      // $dt = Carbon::now();
      // $fees = DB::table('fees')->whereMonth('created_at',  $dt->subMonths(1))->get()->all();

      // $fees = Fee::where('created_at','>=',Carbon::now()->subdays(30))->get();

      // $fees = Fee::where('created_at', '>=', Carbon::now()->subMonths(1))->get();

      $dt = Carbon::now();
      $fees = DB::table('students as std')
            ->rightJoin('fees as fee', 'std.id', '=', 'fee.student_id')
            ->whereMonth('fee.created_at',  $dt->subMonths(1))
            ->get();
      return view('fees.notPaid', compact('fees'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
          'student_id'=>'required|min: 6|max: 6',
          'class'=>'required',
          'fee'=>'required',
          'discount'=>'required',
          'paid'=>'required',
    ]);



      Fee::create([
          'student_id' => request('student_id'),
          'class' => request('class'),
          'fee' => request('fee'),
          'discount' => request('discount'),
          'paid' => request('paid'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        try {
         session()->flash('success', 'عملیات موافقانه اجرا شد ');
         return back();
         } catch(Exception $ex) {
         session()->flash('failed', 'خطا! دوباره کوشش کنید');
         return back();
       }
    }



        public function show($id) {
         $fee = DB::select('select * from fees where id = ?',[$id]);
         $classes = Clas::all();
         return view('fees.editFee',['fee'=>$fee, 'classes'=> $classes]);
      }


      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Task  $task
       * @return \Illuminate\Http\Response
       */
       public function edit(Request $request,$id) {
          $student_id = $request->input('student_id');
          $class = $request->input('class');
          $fee = $request->input('fee');
          $discount = $request->input('discount');
          $paid = $request->input('paid');

          DB::update('update fees set student_id = ? where id = ?',[$student_id, $id]);
          DB::update('update fees set class = ? where id = ?',[$class, $id]);
          DB::update('update fees set fee = ? where id = ?',[$fee, $id]);
          DB::update('update fees set discount = ? where id = ?',[$discount, $id]);
          DB::update('update fees set paid = ? where id = ?',[$paid, $id]);
          return redirect('/fee');
       }


       public function printFee(Request $request,$id)
         {
           $fees = DB::table('students as std')
                 ->rightJoin('fees as fee', 'std.id', '=', 'fee.student_id')
                 ->where('fee.id', $id)
                 ->get();
           return view('fees.invioce', compact('fees'));
         }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from fees where id = ?',[$id]);
     return back();
   }
}
