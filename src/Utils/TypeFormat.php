<?php

namespace App\Utils;

class TypeFormat {

	public static function format(int $type): string {
		switch ($type) {
			case 1:
				return "TYPE_SAVORY";
			case 2:
				return "TYPE_SWEET";
			default:
				return "";
		}
	}
}
