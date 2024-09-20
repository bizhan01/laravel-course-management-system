<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Expense;
use DB;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     // * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //   $expenses= Expense::latest();

    //   if($month =request('month')){
    //     $expenses->whereMonth('date', Carbon::parse($month)->month);
    //   }

    //   if($year=request('year')){
    //     $expenses->whereYear('date', $year);
    //   }
    //   $expenses = $expenses->get();

    //   $archives= Expense::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
    //   ->groupBy('year','month')
    //   ->orderByRaw('min(date)desc')
    //   ->get()
    //   ->ToArray();


    //   return view('expense.expense', compact('expenses', 'archives') );
    // }

    public function expenses($from='', $to='') {
      if ($from == '' && $to=='') {
        $expenses = DB::table('expenses')
          ->whereDate('created_at', Carbon::today())
          ->orderBy('created_at')
          ->get();
      }
      else {
        $expenses = DB::table('expenses')
          ->whereBetween('created_at',[$from, $to])
          ->orderBy('created_at')
          ->get(); 
      }
      return view('expense.expense', compact('expenses') );
    }


    public function assets()
    {
      $expenses = DB::table('expenses')->where('category', 'اجناس')->get();
      return view('expense.assets', compact('expenses') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'item'=>'required',
            'date' => 'required',
            'category' =>'required',
            'consumer' => 'required',
            'price' => 'required','max:255',
            'quantity' => 'required',
            'total' => 'required','max:255',

        ]);

          Expense::create([
              'item' => request('item'),
              'date' => request('date'),
              'category' => request('category'),
              'consumer' => request('consumer'),
              'billNumber' => request('billNumber'),
              'price' => request('price'),
              'quantity' => request('quantity'),
              'total' => request('total'),
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
    public function edit(Expense $expense)
    {
        return view('expense.editExpense',compact('expense',$expense));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //Validate
        $request->validate([
            'item' => 'required',
            'date' => 'required',
        ]);

        $expense->item = $request->item;
        $expense->date = $request->date;
        $expense->category = $request->category;
        $expense->consumer = $request->consumer;
        $expense->billNumber = $request->billNumber;
        $expense->price = $request->price;
        $expense->quantity = $request->quantity;
        $expense->total = $request->total;
        $expense->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/expense');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Expense $expense)
    {
        $expense->delete();
        return redirect('/expense');
    }
}
