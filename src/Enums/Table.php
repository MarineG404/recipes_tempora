<?php

namespace App\Enums;

enum Table: string {
    case RECIPES = 'recipes';
	case CHEF = 'chef';
	case INGREDIENTS = 'ingredients';
	case RECIPE_INGREDIENTS = 'recipe_ingredients';
	case DIFFICULTIES = 'difficulties';
	case TYPES = 'types';
}
