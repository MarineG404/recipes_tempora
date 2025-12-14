<?php

namespace App\Utils;

class RoleFormat {
	/**
	 * Format role name
	 *
	 * @param int $role Role identifiant
	 *
	 * @return string
	 */
	public static function format(int $role): string {
		switch ($role) {
			case 1:
				return "MAIN_ROLE_USER";
			case 10:
				return "MAIN_ROLE_ADMIN";
			default:
				return "Unknown";
		}
	}
}
