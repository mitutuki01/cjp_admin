<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MstProduct;
use App\MstGenre;
use App\Stock;

class StockSearchController extends Controller
{
	public function search(){ 
		$searchWord = "";

		$productMap = MstProduct::getMap();
		$genreMap = MstGenre::getMap();
		$stockList = DB::table('stocks')
                     ->select(DB::raw('id, name, sum(stock) as total_stock'))
                     ->where('id', 'like', '%'.$searchWord.'%')
                     ->orWhere('name', 'like', '%'.$searchWord.'%')
                     ->groupBy('name')
                     ->get();
		$stockList = Stock::all();

		return view('stock.stockSearch', [
            'title' => '在庫管理システム',
            'productMap' => $productMap,
            'genreMap' => $genreMap,
            'stockList' => $stockList
        ]);
    }
}
