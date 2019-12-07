<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use App\StockHistory;
use App\UserStocks;
use App\UserAccounts;
use View;
use App\Transactions;

class StockController extends Controller
{
    public function getStockDetails(Request $request){
        $stock = Stock::where('name', $request->get('name'))
                ->first();
        if($stock){
            // we found it
            $history = StockHistory::where('stockId', $stock['id'])
                                    ->first();
            
            $stock->history = $history->history;
            return View::make('pages.stockDescription')->with('stock', $stock);
        }
        else
            return json_encode("stock not found");
    }

    public function getMyStocks(){
        $id = (auth()->user()->id);
        $myStocks = UserStocks::where('userId', $id)
                                ->get();
        
        if(count($myStocks) == 0){
            $myStocks = "You have not purchased any stocks.";
        }
        else{
            for($i=0;$i<count($myStocks);$i++){
                $stock = Stock::where('id', $myStocks[$i]->stockId)
                                ->first();
                $myStocks[$i]->price = $stock->price;
                $myStocks[$i]->name = $stock->name;
                $myStocks[$i]->symbol = $stock->symbol;
            }
        }
        return View::make('pages.table_list')->with('myStocks', $myStocks);

        // return view('pages.table_list')->with($myStocks);
    }

    public function addStock(Request $request){
        $name = $request->get('name');
        $symbol = $request->get('symbol');
        $price = $request->get('price');
        $description = $request->get('description');

        $stock = new Stock();
        $stock->name = $name;
        $stock->symbol = $symbol;
        $stock->price = $price;
        $stock->description = $description;
        $stock->save();

        $stock = Stock::where('name', $name)
                    ->first();

        $id = $stock->id;
        $history = new StockHistory();
        $history->stockId = $id;
        $history->history = json_encode($request->get('history'));

        $history->save();

        return json_encode('success!');
    }

    public function sellStock(Request $request){
        usleep(1000000);

        $t = new Transactions();

        $t->userId = auth()->user()->id;
        $t->stockId = $request->get('id');
        $t->quantity = $request->get('quantity');
        $t->price = $request->get('price');
        $t->type = 1;

        $t->save();

        $x = UserStocks::where('userId', auth()->user()->id)
                        ->where('stockId', $request->get('id'))
                        ->get();
        if(count($x) == 0){
            return json_encode('error');
        }
        else{
            $q = $x[0]->quantity;
            // dd($q, $request->get('quantity'), $request->get('balance'));
            UserStocks::where('userId', auth()->user()->id)
                        ->where('stockId', $request->get('id'))
                        ->update(['quantity' => $q - $request->get('quantity')]);
        }

        

        // updating the balance
        UserAccounts::where('userId', auth()->user()->id)
                        ->where('status', 1)
                        ->update(['balance' => $request->get('balance')]);
        return json_encode('Success!');

    }

    public function buyStock(Request $request){
        usleep(1000000);

        $t = new Transactions();

        $t->userId = auth()->user()->id;
        $t->stockId = $request->get('id');
        $t->quantity = $request->get('quantity');
        $t->price = $request->get('price');
        $t->type = 0;

        $t->save();

        $x = UserStocks::where('userId', auth()->user()->id)
                        ->where('stockId', $request->get('id'))
                        ->get();
        if(count($x) == 0){
            $u = new UserStocks();
            $u->userId = auth()->user()->id;
            $u->stockId = $request->get('id');
            $u->quantity = $request->get('quantity');

            $u->save();
        }
        else{
            $q = $x[0]->quantity;

            UserStocks::where('userId', auth()->user()->id)
                        ->where('stockId', $request->get('id'))
                        ->update(['quantity' => $q + $request->get('quantity')]);
        }

        

        // updating the balance
        UserAccounts::where('userId', auth()->user()->id)
                        ->where('status', 1)
                        ->update(['balance' => $request->get('balance')]);
        return json_encode('Success!');

    }

    public function getStocks(){
        $stocks = Stock::get();
        $myStocks = UserStocks::where('userId', auth()->user()->id)
                                ->get();
        for($i=0; $i<count($stocks);$i++){
            $stocks[$i]->quantity = 0;
            
            for($j = 0; $j < count($myStocks); $j++){
                if($myStocks[$j]->stockId == $stocks[$i]->id){
                    $stocks[$i]->quantity = $myStocks[$j]->quantity;
                }
            }
        }

        $account = UserAccounts::where('userId', auth()->user()->id)
                                ->where('status', 1)
                                ->first();
        
        return View::make('pages.typography')->with(['stocks' => $stocks, 'balance' => $account->balance]);
    }
}
