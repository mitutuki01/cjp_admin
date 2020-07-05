<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstProduct extends Model
{
	static public function getMap(){
		$modelList = MstProduct::all();
		$modelMap = [];
		foreach($modelList as $model){
			$modelMap[$model['product_id']] = $model;
		}
		return $modelMap;
	}
}
