<?php

namespace App\Utils;

class DifficultyFormat {
	/**
	 * Format difficulty name
	 *
	 * @param int $difficulty Difficulty level
	 *
	 * @return string
	 */
	public static function format(int $difficulty): string {
		switch ($difficulty) {
			case 1:
			default:
				return "DIFFICULTY_EASY";
			case 2:
				return "DIFFICULTY_MEDIUM";
			case 3:
				return "DIFFICULTY_HARD";
		}
	}
}
