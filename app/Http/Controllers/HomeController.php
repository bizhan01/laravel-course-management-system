<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Employee;
use App\User;
use DB;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $dt = Carbon::now();
        $dt->isWeekend();
        // $this->send('h.abdullah1394@gmail.com');
        if ($dt->isWeekend()) {
            // send('aliullah.alyasi@gmail.com');
            // send('h.abdullah1394@gmail.com');
        }
        // $dt->isWeekday();
        // if($dt->isWeekday()) {
        //     dd('week day');
        // }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $empolyeeCount = DB::table('employees')->count('id');
        $users = DB::table('users')->count('id');
        $teachers = DB::table('teachers')->count();
        $students = DB::table('students')->count();
        $pure_revenu = DB::table('revenues')->whereMonth('date', Carbon::now())->sum('amount');
        $expenses = DB::table('expenses')->whereMonth('date', Carbon::now())->sum('total');
        return view('home', compact('empolyeeCount', 'users', 'teachers', 'students', 'pure_revenu', 'expenses'));
    }

    public function send($e) {
        $week = Carbon::today()->subDays(7);
        $order_amount = DB::table('orders')->where('created_at','>=', $week)->count();
        $order_items_amount = DB::table('orders as o')
            ->join('order_items as oi', 'o.id', 'oi.order_id')
            ->where('o.created_at', '>=', $week)
            ->count();
        $message = "تعداد سفارشات هفته جاری" ."(" .$order_amount .")";
        $message .= "که شامل(" .$order_items_amount .") غذا میشود.";
        $message .= date("Y-m-d", strtotime(Carbon::now()));
        $to = $e;
        $subject = 'گذارش سفارشات رستورانت بهارسراب';
        $from = 'h.abdullah1394@gmail.com';
        
        // $headers  = 'MIME-Version: 1.0' . "\r\n";
        // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // $headers .= 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n" .'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message)){
            // echo 'Your mail has been sent successfully.';
        } else{
            // echo 'Unable to send email. Please try again.';
        }
    }
}
