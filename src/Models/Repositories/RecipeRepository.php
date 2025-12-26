<?php

namespace App\Models\Repositories;

use App\Enums\Table;
use App\Models\Entities\Recipe;
use PDO;
use Tempora\Utils\ApplicationData;

class RecipeRepository extends Recipe {

	public function hydrate(): self {

		$recipeData = ApplicationData::request(
			query: "SELECT uid, uid_user, uid_chef, name, description, steps, duration, id_difficulty, kitchenware, nb_people, id_type FROM " . Table::RECIPES->value . " WHERE uid = :uid",
			data: [
				"uid" => $this->getUid(),
			],
			returnType: PDO::FETCH_ASSOC,
			singleValue: true
		);

		$ingredientsId = ApplicationData::request(
			query: "SELECT id_ingredient, quantity FROM " . Table::RECIPE_INGREDIENTS->value . " WHERE uid_recipe = :uid_recipe",
			data: [
				"uid_recipe" => $this->getUid(),
			],
			returnType: PDO::FETCH_COLUMN
		);

		$ingredients = [];
		foreach ($ingredientsId as $id) {
			$ingredientRepo = New IngredientRepository();
			$ingredientRepo->setId(id: $id);
			$ingredientRepo->hydrate();
			$ingredients[] = $ingredientRepo;
		}

		$author = new UserRepository()
			->setUid(uid: $recipeData['uid_user'])
			->hydrate()
		;

		$chef = new UserRepository()
			->setUid(uid: $recipeData['uid_chef'])
			->hydrate()
		;

		if ($recipeData != null) {
			$this->setName(name: $recipeData['name']);
			$this->setDescription(description: $recipeData['description']);
			$this->setIngredients(ingredients: $ingredients);
			$this->setSteps(steps: $recipeData['steps']);
			$this->setDuration(duration: $recipeData['duration']);
			$this->setDifficulty(difficulty: (int)$recipeData['id_difficulty']);
			$this->setKitchenware(kitchenware: $recipeData['kitchenware']);
			$this->setPeople(people: (int)$recipeData['nb_people']);
			$this->setType(type: (int)$recipeData['id_type']);
			$this->setAuthor(author: $author);
			$this->setChef(chef: $chef);
		}

		return $this;
	}

	public static function getRecipes(): array {
		return ApplicationData::request(
			query: "SELECT uid FROM " . Table::RECIPES->value,
			returnType: PDO::FETCH_COLUMN
		);
	}
}
