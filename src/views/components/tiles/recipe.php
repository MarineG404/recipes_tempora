<?php
	use App\Utils\DifficultyFormat;
	use Tempora\Utils\Cache\Route;
?>

<div class="recipe-card">
	<h3>
		<a href="<?= Route::getPath(name: "app_recipe_details_get", options: ["uid" => $recipe->getUid() ?? ""]) ?>">
			<?= ucfirst(htmlspecialchars(string: $recipe->getName() ?? "")) ?>
		</a>
	</h3>

	<div class="recipe-meta">
		<div class="meta-item">
			<i class="ri-time-line"></i>
			<span><?= htmlspecialchars(string: $recipe->getDuration() ?? "") ?></span>
		</div>

		<div class="meta-item">
			<i class="ri-group-line"></i>
			<span><?= htmlspecialchars(string: $recipe->getPeople() ?? "") ?></span>
		</div>

		<div class="meta-item">
			<i class="ri-star-line"></i>
			<span><?= htmlspecialchars(string: $recipeLang->translate(key: DifficultyFormat::format(difficulty: $recipe->getDifficulty() ?? 1))) ?></span>
		</div>
	</div>

	<div class="recipe-author">
		<i class="ri-user-line"></i>
		Auteur</span>
	</div>
</div>
