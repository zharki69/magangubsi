<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Terbilang Helper
 *
 * @package	CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author	Gede Lumbung
 * @link	http://gedelumbung.com
 */

if (!function_exists('number_to_words')) {
	function number_to_words($number, $rupiah = ' Rupiah')
	{
		$before_comma = trim(to_word($number));
		$hasil = ucwords($results = $before_comma . $rupiah); //tanpa koma

		// $after_comma = trim(comma($number));
		// $hasil = ucwords($results = $before_comma.' koma '.$after_comma); //dengan koma
		return $hasil;
	}

	function to_word($number)
	{
		$words = "";
		$arr_number = array(
			"",
			"satu",
			"dua",
			"tiga",
			"empat",
			"lima",
			"enam",
			"tujuh",
			"delapan",
			"sembilan",
			"sepuluh",
			"sebelas"
		);

		if ((int) $number < 12) {
			$words = " " . $arr_number[$number];
		} else if ((int) $number < 20) {
			$words = to_word((int) $number - 10) . " belas";
		} else if ((int) $number < 100) {
			$words = to_word((int) $number / 10) . " puluh " . to_word((int) $number % 10);
		} else if ((int) $number < 200) {
			$words = "seratus " . to_word((int) $number - 100);
		} else if ((int) $number < 1000) {
			$words = to_word((int) $number / 100) . " ratus " . to_word((int) $number % 100);
		} else if ((int) $number < 2000) {
			$words = "seribu " . to_word((int) $number - 1000);
		} else if ((int) $number < 1000000) {
			$words = to_word((int) $number / 1000) . " ribu " . to_word((int) $number % 1000);
		} else if ((int) $number < 1000000000) {
			$words = to_word((int) $number / 1000000) . " juta " . to_word((int) $number % 1000000);
		} else if ((int) $number < 1000000000000) {
			$words = to_word((int) $number / 1000000000) . " miliar " . to_word((int) $number % 1000000000);
		} else if ((int) $number < 1000000000000000) {
			$words = to_word((int) $number / 1000000000000) . " triliun " . to_word((int) $number % 1000000000000);
		} else {
			$words = "undefined";
		}
		return $words;
	}

	function comma($number)
	{
		$after_comma = stristr($number, ',');
		$arr_number = array(
			"nol",
			"satu",
			"dua",
			"tiga",
			"empat",
			"lima",
			"enam",
			"tujuh",
			"delapan",
			"sembilan"
		);

		$results = "";
		$length = strlen($after_comma);
		$i = 1;
		while ($i < $length) {
			$get = substr($after_comma, $i, 1);
			$results .= " " . $arr_number[$get];
			$i++;
		}
		return $results;
	}
}
