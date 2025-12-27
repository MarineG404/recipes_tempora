<?php
	use App\Enums\Path;
	use App\Models\Repositories\RecipeRepository;
	use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
?>

<div class="recipes-container">
	<div class="recipes-header">
		<h1><?= $pageLang->translate(key: "RECIPES_TITLE") ?></h1>
		<?php if (isset($_SESSION["user"]["uid"])): ?>
			<button class="create_recipe_btn">
				<i class="ri-add-line"></i>
			</button>
		<?php endif ?>
	</div>

	<div class="recipe-cards">
		<?php
			$recipeLang = new Lang(filePath: "components/tiles/recipe");

			foreach ($recipesUid as $recipeUid) {
				$recipe = (new RecipeRepository())
					->setUid(uid: $recipeUid)
					->hydrate();

				require Path::COMPONENT_TILES->value . "/recipe.php";
			}
		?>
	</div>
</div>

<div class="modal_container">
	<?php
		if (isset($_SESSION["user"]["uid"])){
			include Path::COMPONENT_FORMS->value . "/recipe_form.php";
		}
	?>
</div>
