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

		$ingredientQuantity = ApplicationData::request(
			query: "SELECT quantity FROM " . Table::RECIPE_INGREDIENTS->value . " WHERE id_ingredient = :id_ingredient",
			data: [
				"id_ingredient" => $this->getId()
			],
			returnType: PDO::FETCH_COLUMN,
			singleValue: true
		);

		if ($ingredientData != null) {
			$this->setName(name: $ingredientData['name']);
			$this->setQuantity(quantity: $ingredientQuantity);
		}

		return $this;
	}
}
