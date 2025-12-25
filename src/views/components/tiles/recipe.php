<?php

use App\Utils\DifficultyFormat;
use App\Utils\TypeFormat;
use Tempora\Utils\Cache\Route;

?>
<div class="recipe-card">
	<h3><a href="<?= Route::getPath(name: "app_recipe_details_get", options: ["uid" => $recipe->getUid() ?? ""]) ?>"><?= htmlspecialchars(string: $recipe->getName() ?? "") ?></a></h3>
	<p><?= htmlspecialchars(string: $recipe->getDescription() ?? "") ?></p>
	<p><strong><?= $pageLang->translate(key: "STEPS") ?>:</strong> <?= htmlspecialchars(string: $recipe->getSteps() ?? "") ?></p>
	<p><strong><?= $pageLang->translate(key: "DURATION") ?>:</strong> <?= htmlspecialchars(string: $recipe->getDuration() ?? "") ?></p>
	<p><strong><?= $pageLang->translate(key: "DIFFICULTY") ?>:</strong> <?= htmlspecialchars(string: $recipeLang->translate(key: DifficultyFormat::format(difficulty: $recipe->getDifficulty() ?? 1))) ?></p>
	<p><strong><?= $pageLang->translate(key: "KITCHENWARE") ?>:</strong> <?= htmlspecialchars(string: $recipe->getKitchenware() ?? "") ?></p>
	<p><strong><?= $pageLang->translate(key: "PEOPLE") ?>:</strong> <?= htmlspecialchars(string: $recipe->getPeople() ?? "") ?></p>
	<p><strong><?= $pageLang->translate(key: "TYPE") ?>:</strong> <?= htmlspecialchars(string: $recipeLang->translate(key: TypeFormat::format(type: $recipe->getType() ?? 1))) ?></p>

	<?php
	foreach ($recipe->getIngredients() as $ingredient) {
		?>
		<p>
			<strong><?= $pageLang->translate(key: "INGREDIENT") ?>:</strong> <?= htmlspecialchars(string: $ingredient->getName() ?? "") ?>
		</p>
		<p>
			<strong><?= $pageLang->translate(key: "QUANTITY") ?>:</strong> <?= htmlspecialchars(string: $ingredient->getQuantity() ?? "") ?>
		</p>
		<?php
	}
	?>
</div>
