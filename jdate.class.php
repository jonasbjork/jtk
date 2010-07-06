<?php

class JDate {

	/**
		Can take unix timestamp (as int), "Y-m-d", "Y-m-d H:i:s"
		and nothing (null) as argument. Will return an array with
		information about the week.

		@author Jonas Björk, jonas@jonasbjork.net
	*/
	function getWeek($date = false) {
		$week = array();
		if (!$date) {
			$date = time();
		}
		if (is_int($date)) {
			$date = $date;
			$week['date'] = date("Y-m-d", $date);
			$week['date_unix'] = $date;
		} else {
			$week['date'] = $date;
			$date = strtotime($date);
			$week['date_unix'] = $date;
		}
		if(date("w", $date)==1) {
			$week['monday'] = date("Y-m-d", $date);
			$week['monday_unix'] = $date; 
		} else {
			$week['monday'] = date("Y-m-d", strtotime("last Monday", $date));
			$week['monday_unix'] = strtotime("last Monday", $date);
		}
		if(date("w", $date)==0) {
			$week['sunday'] = date("Y-m-d", $date);
			$week['sunday_unix'] = $date;
		} else {
			$week['sunday'] = date("Y-m-d", strtotime("next Sunday", $date));
			$week['sunday_unix'] = strtotime("next Sunday", $date);
		}
		$week['week_number'] = date("W", $date);
		return $week;
	}

}

