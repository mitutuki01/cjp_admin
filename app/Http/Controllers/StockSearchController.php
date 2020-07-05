<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MstProduct;
use App\MstGenre;
use App\Stock;

class StockSearchController extends Controller
{
	public function search(){ 


		$productMap = MstProduct::getMap();
		$genreMap = MstGenre::getMap();
		$stockList = Stock::all();

		return view('stock.stockSearch', [
            'title' => '在庫管理システム',
            'productMap' => $productMap,
            'genreMap' => $genreMap,
            'stockList' => $stockList
        ]);
    }
}
