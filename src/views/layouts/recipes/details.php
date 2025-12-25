<?php
	use App\Enums\Path;
use App\Utils\DifficultyFormat;
use App\Utils\TypeFormat;
use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";

	$recipeLang = new Lang(filePath: "components/tiles/recipe");
?>

<article class="recipe-details">

	<h1><?= ucfirst(htmlspecialchars(string: $recipe->getName() ?? "")) ?></h1>

	<?php if ($recipe->getDescription() != null): ?>
		<div class="description">
			<i class="ri-news-line"></i>
			<?= ucfirst(htmlspecialchars(string: $recipe->getDescription() ?? "")) ?>
		</div>
	<?php endif; ?>


	<div class="info">
		<div class="item">
			<i class="ri-time-line"></i>
			<p><?= htmlspecialchars(string: $recipe->getDuration() ?? "") ?></p>
		</div>

		<div class="item">
			<i class="ri-group-line"></i>
			<p><?= htmlspecialchars(string: $recipe->getPeople() ?? "") ?></p>
		</div>

		<div class="item">
			<i class="ri-star-line"></i>
			<?= htmlspecialchars(string: $recipeLang->translate(key: DifficultyFormat::format(difficulty: $recipe->getDifficulty() ?? 1))) ?></p>
		</div>

		<div class="item">
			<i class="ri-restaurant-line"></i>
			<p><?= htmlspecialchars(string: $recipe->getKitchenware() ?? $pageLang->translate(key: "NO_KITCHENWARE")) ?></p>
		</div>

		<div class="item">
		<div class="item">
			<?php if ($recipe->getType() === 1): ?>
				<i class="ri-restaurant-2-line"></i>
			<?php else: ?>
				<i class="ri-cake-3-line"></i>
			<?php endif; ?>
			<p><?= htmlspecialchars(string: $recipeLang->translate(key: TypeFormat::format(type: $recipe->getType() ?? 1))) ?></p>
		</div>
		</div>
	</div>

	<div class="details-container">
		<div class="ingredients">
			<h2><i class="ri-shopping-basket-line"></i> <?= $pageLang->translate(key: "INGREDIENT") ?></h2>
			<?php foreach ($recipe->getIngredients() as $ingredient): ?>
				<div class="item">
					<p>
						<?= htmlspecialchars(string: $ingredient->getQuantity() ?? "") ?> <?= htmlspecialchars(string: $ingredient->getName() ?? "") ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="instructions">
			<h2><i class="ri-file-list-3-line"></i> <?= $pageLang->translate(key: "STEPS") ?></h2>
			<p><?= htmlspecialchars(string: $recipe->getSteps() ?? "") ?></p>
		</div>
	</div>

</article>



