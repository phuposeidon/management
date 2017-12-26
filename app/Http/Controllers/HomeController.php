<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Transaction;
use Carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard(){

        //Biểu đồ lượt khám
        $getOrdersDate = [];
        $names = [];
        $values = [];

        $today = Carbon::today();
        $now = Carbon::now();
        $getOrdersDate[0] = Order::whereDate('createdAt', array($today, $now))->get();
        $names[0] = Carbon::today()->format('d/m');
        
        $getOrdersDate[1] = Order::whereDate('createdAt', array(Carbon::yesterday() ,Carbon::yesterday()." 23:59:59"))->get();
        $names[1] = Carbon::yesterday()->format('d/m');
        //dd($today->subDays(2)->format('d/m'));
        for($i = 1; $i < 3; $i++)
        {
            $getOrdersDate[$i+1] = Order::whereDate('createdAt', array($today->subDays($i) ,$today->subDays($i)." 23:59:59"))->get();
            $names[$i+1] = Carbon::today()->subDays($i+1)->format('d/m');
        }
        for($j = 0; $j < 4; $j++) {
            $values[$j] = count($getOrdersDate[$j]);
        }
        $names = array_reverse($names);
        $values = array_reverse($values);

        $chart_visits = Charts::create('bar', 'highcharts')
             ->title('Biểu đồ lượt khám bệnh của phòng khám')
             ->dimensions(0, 500) // Width x Height
             ->labels($names)
             ->elementLabel("Lượt khám")
             ->values($values)
             ->responsive(true);

        //Doanh số theo tháng
        $months = [];
        $month[0] = $today->month;
        $months[0] = $today->month.'/'.$today->year;
        $sum[0] = Transaction::whereBetween('created_at', array(Carbon::create(Carbon::today()->year,$month[0],1,0,0,0),Carbon::create(Carbon::today()->year,$month[0],Carbon::today()->daysInMonth,23,59,59)))->select(DB::raw('SUM(totalAmount)  as sum' ))->first()->toArray();
        $totalAmounts[0] = $sum[0]['sum'];

        for($x = 1; $x < 4; $x++)
        {
            
            $month[$x] = Carbon::today()->subMonths($x)->month;
            $years[$x] = Carbon::today()->subMonths($x)->year;
            $firstday = Carbon::create($years[$x],$month[$x],1,0,0,0);
            $lastdayInMonth = Carbon::today()->subMonths($x)->daysInMonth;
            $lastday = Carbon::create($years[$x],$month[$x],$lastdayInMonth,23,59,59);
            
            $sum[$x] = Transaction::whereBetween('created_at', array($firstday,$lastday))->select(DB::raw('SUM(totalAmount)  as sum' ))->first();            
            if($sum[$x]['sum'] == null) $totalAmounts[$x] = 0;
            else $totalAmounts[$x] = $sum[$x]['sum'];

            $months[$x] = $month[$x].'/'.$years[$x];
        }
        $months = array_reverse($months);
        $totalAmounts = array_reverse($totalAmounts);
        $chart_totalAmounts = Charts::create('bar', 'highcharts')
             ->title('Biểu đồ doanh thu các tháng gần đây')
             ->dimensions(0, 500) // Width x Height
             ->labels($months)
             ->elementLabel("Doanh số")
             ->values($totalAmounts)
             ->responsive(true);


        return view('admin.management.dashboard',['chart_visits' => $chart_visits, 'chart_totalAmounts' => $chart_totalAmounts]);
    }
}
