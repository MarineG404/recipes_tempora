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
				return "PROFILE_USER";
			case 10:
				return "PROFILE_ADMIN";
			default:
				return "Unknown";
		}
	}
}
