<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Revenue;
use App\Expense;
use App\Order;
use App\User;
use App\Menu;
use App\Clas;
use App\Fee;
use DB;


class BalanceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function blancess($from='', $to='') {
        if ($from == '' && $to == '') {
            $fees = Fee::all();
            $revenues = DB::table('revenues')
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')
                ->get();
            $expenses = DB::table('expenses')
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')
                ->get();

        }
        else {
            $fees = DB::table('fees')
                ->whereBetween('created_at', [$from, $to])
                ->orderBy('id', 'desc')
                ->get();
            $revenues = DB::table('revenues')
                ->whereBetween('created_at',[$from, $to])
                ->orderBy('created_at')
                ->get();
            $expenses = DB::table('expenses')
                ->whereBetween('created_at',[$from, $to])
                ->orderBy('created_at')
                ->get();
        }
        return view('balance.balance', compact('revenues', 'expenses', 'fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('menu/addMenu');
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
            'foodName'=>'required',
            'category'=>'required',
            'cost'=>'required',
            'foodImage' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('foodImage')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name);
        }
        else {
          $new_name = 'about.png';
        }
          Menu::create([
              'foodName' => request('foodName'),
              'category' => request('category'),
              'cost' => request('cost'),
              'foodImage' => $new_name,
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),

            ]);
            return redirect('#');
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
    public function edit(Menu $menu)
    {
        return view('menu/editMenu',compact('menu',$menu));
    }


    public function edittt(Menu $menu)
    {
        return view('menu/editMenu',compact('menu',$menu));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonlInfo $personlInfo)
    {
        //Validate
        $request->validate([
            'fullName' => 'required',
            'profession' => 'required',
        ]);

        $personlInfo->fullName = $request->fullName;
        $personlInfo->profession = $request->profession;
        $personlInfo->dob = $request->dob;
        $personlInfo->phone = $request->phone;
        $personlInfo->email = $request->email;
        $personlInfo->address = $request->address;
        $personlInfo->profileImage = $request->profileImage;
        $personlInfo->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/personlInfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Menu $menu)
    {
        $menu->delete();
        return redirect('/menu');
    }
}
