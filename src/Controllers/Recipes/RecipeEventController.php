<?php

namespace App\Controllers\Recipes;


use App\Models\Repositories\IngredientRepository;
use App\Models\Repositories\RecipeRepository;
use App\Models\Repositories\UserRepository;
use Tempora\Attributes\RouteAttribute;
use Tempora\Controllers\Controller;
use Tempora\Utils\System;

class RecipeEventController extends Controller {
	#[RouteAttribute(
		path: "/recipes",
		name: "app_recipe_events_post",
		method: "POST",
		needLoginToBe: true
	)]
	public function render(): void {
		if (isset($_POST["recipe_name"])) {
			$userRepository = new UserRepository()
				->setUid(uid: $_SESSION["user"]["uid"])
				->hydrate()
			;

			$uid_recipe = System::uidGen(table: "recipes");

			$ingredients = [];
			if (isset($_POST["recipe_ingredient_id"]) && isset($_POST["recipe_ingredient_quantity"])) {
				$ingredientIds = $_POST["recipe_ingredient_id"];
				$ingredientQuantities = $_POST["recipe_ingredient_quantity"];

				foreach ($ingredientIds as $index => $ingredientId) {
					if (!empty($ingredientId) && !empty($ingredientQuantities[$index])) {
						$ingredient = new IngredientRepository();
						$ingredient
							->setId(id: (int)$ingredientId)
							->setQuantity(quantity: $ingredientQuantities[$index])
						;
						$ingredients[] = $ingredient;
					}
				}
			}

		$chef = $userRepository;
		if (isset($_POST["recipe_chef"]) && !empty($_POST["recipe_chef"])) {
			$chef = new UserRepository();
			$chef
				->setUid(uid: $_POST["recipe_chef"])
				->hydrate()
			;
		}

			$recipe = new RecipeRepository();
			$recipe
				->setUid(uid: $uid_recipe)
				->setName(name: $_POST["recipe_name"] ?? null)
				->setDescription(description: $_POST["recipe_description"] ?? null)
				->setDuration(duration: $_POST["recipe_duration"] ?? null)
				->setSteps(steps: $_POST["recipe_steps"] ?? null)
				->setPeople(people: isset($_POST["recipe_people"]) ? (int)$_POST["recipe_people"] : null)
				->setDifficulty(difficulty: isset($_POST["recipe_difficulty"]) && !empty($_POST["recipe_difficulty"]) ? (int)$_POST["recipe_difficulty"] : null)
				->setType(type: isset($_POST["recipe_type"]) && !empty($_POST["recipe_type"]) ? (int)$_POST["recipe_type"] : null)
				->setAuthor(author: $userRepository)
				->setChef(chef: $chef)
				->setKitchenware(kitchenware: $_POST["recipe_kitchenware"] ?? null)
			;

			$recipe->addRecipe();

			foreach ($ingredients as $ingredient) {
				$ingredient->addRecipeIngredient(recipeUid: $uid_recipe);
			}
		}

		System::redirect("/recipes");
	}
}
