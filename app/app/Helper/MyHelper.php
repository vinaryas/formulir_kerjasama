<?php
namespace App\Helper;
use Carbon\Carbon;

class MyHelper{
    public static function toastNotification($replaceValue = [])
	{
		$notification = [
	        'success' => true,
	        'heading' => 'Success',
	        'text' => 'Store successfully added from promotion',
	        'showHideTransition' => true,
	        'icon' => 'success',
	        'position' => 'top-end',
	        'data' => null,
		];

		return array_replace($notification, $replaceValue);	
	}

	public static function getYear($range = 30)
    {
        $rangeYears = range(Carbon::now()->year, Carbon::now()->year - $range);
		$years = [];
		$years[] = ['id' => '', 'text' => ''];

        foreach($rangeYears as $data)
        {
            $years[] = ['id' => $data, 'text' => $data];
        }

        return $years;
    }
}