<?php

namespace App\Controllers\Recipes;

use App\Enums\Path;
use App\Models\Repositories\RecipeRepository;
use Tempora\Attributes\RouteAttribute;
use Tempora\Controllers\Controller;
use Tempora\Utils\Lang;

class RecipesController extends Controller {
	#[RouteAttribute(
		path: "/recipes",
		name: "app_recipes_get",
		method: "GET",
		description: "Recipes page",
		title: "RECIPES_TITLE",
		translateTitle: true,
		translateFile: "pages/recipes",
	)]

	public function render(): void {
		$pageData = $this->getPageData();
		$pageLang = new Lang(filePath: "pages/recipes");

		$recipesUid = RecipeRepository::getRecipes();

		$this->setStyles(styles: [
			"/assets/styles/main.css",
			"/assets/styles/remixicon.css"
		]);

		$this->setScripts(scripts: [
			"/assets/scripts/engine.js",
			"/assets/scripts/theme.js"
		]);

		require Path::LAYOUT->value . "/header.php";

		require Path::LAYOUT->value . "/recipes/index.php";

		include Path::LAYOUT->value . "/footer.php";
	}
}
