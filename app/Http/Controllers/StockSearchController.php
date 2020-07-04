<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockSearchController extends Controller
{
	public function search(){ 

		return view('stock.stockSearch', [
            'title' => '在庫管理システム',
            'body' => 'This page is StockSearchController.'
        ]);
    }
}
