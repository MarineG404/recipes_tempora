<?php

namespace App\Models\Repositories;

use App\Enums\Table;
use App\Models\Entities\RecipeIngredients;
use PDO;
use Tempora\Utils\ApplicationData;

class RecipeIngredientsRepository extends RecipeIngredients {

	public function hydrate(): self {

		$recipe = $this->getRecipe();

		$recipeIngredientsData = ApplicationData::request(
			query: "SELECT uid_recipe, id_ingredient, quantity FROM " . Table::RECIPE_INGREDIENTS->value . " WHERE uid_recipe = :uid_recipe",
			data: [
				"uid_recipe" => $recipe->getUid()
			],
			returnType: PDO::FETCH_ASSOC,
			singleValue: true
		);

		if ($recipeIngredientsData != null) {
			$this->setRecipe(recipe: $recipeIngredientsData['uid_recipe']);
			$this->setIngredients(ingredients: $recipeIngredientsData['id_ingredient']);
			$this->setQuantity(quantity: $recipeIngredientsData['quantity']);
		}

		return $this;
	}

}
