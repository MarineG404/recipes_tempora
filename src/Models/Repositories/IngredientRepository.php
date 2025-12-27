<?php

namespace App\Models\Repositories;

use App\Enums\Table;
use App\Models\Entities\Ingredient;
use PDO;
use Tempora\Utils\ApplicationData;

class IngredientRepository extends Ingredient {

	public function hydrate(): self {

		$ingredientData = ApplicationData::request(
			query: "SELECT id, name FROM " . Table::INGREDIENTS->value . " WHERE id = :id",
			data: [
				"id" => $this->getId()
			],
			returnType: PDO::FETCH_ASSOC,
			singleValue: true
		);

		if ($ingredientData != null) {
			$this->setName(name: $ingredientData['name']);
			// Quantity is already set from recipe_ingredients table before hydrate()
		}

		return $this;
	}

	public function addRecipeIngredient(string $recipeUid) {
		return ApplicationData::request(
			query: "INSERT INTO " . Table::RECIPE_INGREDIENTS->value . " (uid_recipe, id_ingredient, quantity) VALUES (:uid_recipe, :id_ingredient, :quantity)",
			data: [
				"uid_recipe" => $recipeUid,
				"id_ingredient" => $this->getId(),
				"quantity" => $this->getQuantity()
			],
			returnType: null,
			singleValue: false
		);
	}

	public static function getAllIngredients(): array {
		return ApplicationData::request(
			query: "SELECT id, name FROM " . Table::INGREDIENTS->value . " ORDER BY name ASC",
			data: [],
			returnType: PDO::FETCH_ASSOC,
			singleValue: false
		);
	}
}
