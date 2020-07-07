<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                     ->select(DB::raw('products.id as id , products.name as name, sum(stocks.stock) as total_stock'))
                     ->join('mst_products', 'stocks.product_id', '=', 'products.product_id')
                     ->where('products.id', 'like', '%'.$searchWord.'%')
                     ->orWhere('products.name', 'like', '%'.$searchWord.'%')
                     ->groupBy('products.name')
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
