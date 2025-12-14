<?php

use App\Enums\Path;
use App\Models\Repositories\RecipeRepository ;
use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
?>

<h1><?= $pageLang->translate(key: "RECIPES_TITLE") ?></h1>

<?php

	$recipeLang = new Lang(filePath: "components/tiles/recipe");
	foreach ($recipesUid as $recipeUid) {
		$recipe = (new RecipeRepository())
			->setUid(uid: $recipeUid)
			->hydrate()
		;
		require Path::COMPONENT_TILES->value . "/recipe.php";
	}

?>
