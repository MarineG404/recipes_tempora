<?php

namespace App\Controllers\Recipes;

use App\Enums\Path;
use App\Models\Repositories\RecipeRepository;
use Tempora\Attributes\RouteAttribute;
use Tempora\Controllers\Controller;
use Tempora\Utils\Lang;

class RecipeDetailsController extends Controller {
	#[RouteAttribute(
		path: '/recipes/$uid',
		name: "app_recipe_details_get",
		method: "GET",
		description: "Recipe details page",
		title: "RECIPE_DETAILS_TITLE",
		translateTitle: true,
		translateFile: "pages/recipes",
	)]

	public function render(): void {
		$pageData = $this->getPageData();
		$pageLang = new Lang(filePath: "pages/recipes");

		$recipe = new RecipeRepository()
			->setUid(uid: $pageData["uid"])
			->hydrate()
		;

		$this->setStyles(styles: [
			"/assets/styles/main.css",
			"/assets/styles/remixicon.css",
			"/assets/styles/recipes/details.css"
		]);

		$this->setScripts(scripts: [
			"/assets/scripts/engine.js",
			"/assets/scripts/theme.js"
		]);

		require Path::LAYOUT->value . "/header.php";

		require Path::LAYOUT->value . "/recipes/details.php";

		include Path::LAYOUT->value . "/footer.php";
	}

}
