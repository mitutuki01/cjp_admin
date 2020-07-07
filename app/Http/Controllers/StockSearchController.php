<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MstProduct;
use App\MstGenre;
use App\Stock;

class StockSearchController extends Controller
{
	public function search(Request $request){ 
		$searchWord = $request->word;

		$productMap = MstProduct::getMap();
		$targetProductId = [];
		if($searchWord == ""){
			$targetProductId = array_keys($productMap);
		}else{
			foreach ($productMap as $id => $product) {
				if(strpos($product['name'], $searchWord) !== false 
					|| strpos(strval($id), $searchWord) !== false ){
					$targetProductId[] = $id;
				}
			}	
		}

		$genreMap = MstGenre::getMap();
		$stockList = DB::table('stocks')
                     ->select(DB::raw('stocks.product_id as id , mst_products.name as name, sum(stocks.stock) as total_stock'))
                     ->join('mst_products', 'stocks.product_id', '=', 'mst_products.product_id')
                     ->whereIn('stocks.product_id', $targetProductId)
                     ->groupBy('stocks.product_id')
                     ->get();

		return view('stock.stockSearch', [
            'title' => '在庫管理システム',
            'productMap' => $productMap,
            'genreMap' => $genreMap,
            'stockList' => $stockList
        ]);
    }
}
