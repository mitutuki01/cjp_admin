<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstGenre extends Model
{
	static public function getMap(){
		$modelList = MstGenre::all();
		$modelMap = [];
		foreach($modelList as $model){
			$modelMap[$model['genre_id']] = $model;
		}
		return $modelMap;
	}
}
