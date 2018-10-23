<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Parking extends Eloquent
{
	public $name;

	protected $fillable = ['carType', 'parked'];

	public static function getTotalSpace(){
		return 50;
	}

	public static function getUsedSpace(){
		return self::sum('parked');
	}

	public static function getFreeSpace(){
		$total = self::getTotalSpace();
		$used = self::getUsedSpace();

		return $total - $used;
	}


}