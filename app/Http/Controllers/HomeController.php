<?php

namespace App\Http\Controllers;
use App\UserStocks;
use App\UserAccounts;
use App\Stock;
use View;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // getting the count of User Stocks
        $userStocks = UserStocks::where('userId', auth()->user()->id)
                                ->whereNotIn('quantity', [0])
                                ->get();
        $userAccounts = UserAccounts::where('userId', auth()->user()->id)
                                ->where('status', 1)
                                ->get();
        
        $stocks = Stock::get();
        $stocks = $stocks->toArray();
        $temp = [];
        $count = 0;
        $start = rand(1,80);
        while($count<9){
            array_push($temp, $stocks[$start + $count]);
            $count++;
        }
        $balance = 0;
        if(count($userAccounts)> 0){
            $balance = $userAccounts[0]->balance;
        }
        $data = [
            "stockCount" => count($userStocks),
            "userAccounts" => $balance,
            "stocks" => $temp
        ];

        return View::make('dashboard')->with('data', $data);

    }

    public function render(){
        $stock = Stock::get();
            
            for($i=0;$i<count($stock);$i++){
                Stock::where('symbol', $stock[$i]->symbol)
                    ->update(['price' => $stock[$i]->price + rand(-5,5)]);
            }
    }
}
