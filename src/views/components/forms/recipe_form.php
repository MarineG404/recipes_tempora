<?php

use App\Enums\Difficulty;
use App\Enums\Type;
use App\Models\Repositories\IngredientRepository;
use App\Models\Repositories\UserRepository;
use App\Utils\DifficultyFormat;
use App\Utils\TypeFormat;
use Tempora\Utils\Cache\Route;
use Tempora\Utils\ElementBuilder\ElementBuilder;
use Tempora\Utils\ElementBuilder\Form;
use Tempora\Utils\Lang;

	$form = new Form;

	// penser à gérer auteur et chef.fe et ingredients plus tard
?>

<div class="modal_recipe_container">

	<h2><?= $pageLang->translate(key: "RECIPE_ADD_TITLE") ?></h2>

	<?php

		$form
			->setAttributs(
				attributs: [
					"method" => "POST",
					"action" => Route::getPath(name: "app_recipe_events_post"),
					"class"  => "recipe_form"
				]
			)
			->setCsrf(csrf: false)
		;

		$input = new ElementBuilder;
		$input
			->setElement(element: "input")
			->setAttributs(
				attributs: [
					"type" => "text",
					"name" => "recipe_name",
					"value" => $pageData["recipe_name"] ?? "",
					"placeholder" => $pageLang->translate(key: "RECIPE_NAME"),
					"required" => "",
					"autofocus" => ""
				]
			)
		;
		$form->addInput(input: $input);


		$input = new ElementBuilder ;
		$input
			->setElement(element: "input")
			->setAttributs(
				attributs: [
					"type" => "text",
					"name" => "recipe_description",
					"value" => $pageData["recipe_description"] ?? "",
					"placeholder" => $pageLang->translate(key: "RECIPE_DESCRIPTION"),
					"maxlength" => "255"
				]
			)
		;
		$form->addInput(input: $input);

		$input = new ElementBuilder ;
		$input
			->setElement(element: "input")
			->setAttributs(
				attributs: [
					"type" => "text",
					"name" => "recipe_duration",
					"value" => $pageData["recipe_duration"] ?? "",
					"placeholder" => $pageLang->translate(key: "RECIPE_DURATION"),
					"maxlength" => "50"
				]
			)
		;
		$form->addInput(input: $input);

		// steps
		$input = new ElementBuilder ;
		$input
			->setElement(element: "textarea")
			->setAttributs(
				attributs: [
					"name" => "recipe_steps",
					"placeholder" => $pageLang->translate(key: "RECIPE_STEPS"),
					"required" => ""
				]
			)
			->setContent($pageData["recipe_steps"] ?? "")
		;
		$form->addInput(input: $input);


		// kitchenware

		$input = new ElementBuilder ;
		$input
			->setElement(element: "input")
			->setAttributs(
				attributs: [
					"type" => "text",
					"name" => "recipe_kitchenware",
					"value" => $pageData["recipe_kitchenware"] ?? "",
					"placeholder" => $pageLang->translate(key: "RECIPE_KITCHENWARE"),
					"maxlength" => "100"
				]
			)
		;
		$form->addInput(input: $input);

		$input = new ElementBuilder ;
		$input
			->setElement(element: "input")
			->setAttributs(
				attributs: [
					"type" => "number",
					"name" => "recipe_people",
					"value" => $pageData["recipe_people"] ?? "",
					"placeholder" => $pageLang->translate(key: "RECIPE_PEOPLE"),
				]
			)
		;
		$form->addInput(input: $input);


		$currentUserId = $_SESSION["user"]["uid"] ?? null;
		$usersOptions = "";
		$allUsersUids = UserRepository::getUsers();
		foreach ($allUsersUids as $uid) {
			$userRepo = new UserRepository();
			$userRepo->setUid(uid: $uid)->hydrate();
			$userFullName = ucfirst($userRepo->getName()) . ' ' . strtoupper($userRepo->getSurname());
			$selected = "";
			if (isset($pageData["recipe_chef"]) && $pageData["recipe_chef"] == $uid) {
				$selected = "selected";
			} elseif (!isset($pageData["recipe_chef"]) && $uid == $currentUserId) {
				$selected = "selected";
			}
			$usersOptions .= "<option value='{$uid}' {$selected}>{$userFullName}</option>";
		}

		$label = new ElementBuilder;
		$label
			->setElement(element: "label")
			->setContent(content: $pageLang->translate(key: "RECIPE_CHEF_LABEL"))
		;
		$form->addInput(input: $label);

		$select = new ElementBuilder;
		$select
			->setElement(element: "select")
			->setAttributs(
				attributs: [
					"name" => "recipe_chef",
					"required" => ""
				]
			)
			->setContent(content: $usersOptions)
		;
		$form->addInput(input: $select);


		$ingredientsOptions = "";
		$allIngredients = IngredientRepository::getAllIngredients();
		foreach ($allIngredients as $ingredient) {
			$ingredientsOptions .= "<option value='{$ingredient['id']}'>{$ingredient['name']}</option>";
		}

		$ingredientsContainer = new ElementBuilder;
		$ingredientsContainer
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "ingredients-container",
					"data-ingredients-options" => htmlspecialchars($ingredientsOptions)
				]
			)
			->setContent(content: "
				<div class='ingredient-row'>
					<input type='text' name='recipe_ingredient_quantity[]' placeholder='" . $pageLang->translate(key: "RECIPE_INGREDIENT_QUANTITY") . "' required />
					<select name='recipe_ingredient_id[]' required>
						<option value=''>" . $pageLang->translate(key: "RECIPE_INGREDIENT_SELECT") . "</option>
						{$ingredientsOptions}
					</select>
					<button type='button' class='remove-ingredient-btn' disabled><i class='ri-close-line'></i></button>
				</div>
			")
		;
		$form->addInput(input: $ingredientsContainer);

		$addIngredientBtn = new ElementBuilder;
		$addIngredientBtn
			->setElement(element: "button")
			->setAttributs(
				attributs: [
					"type" => "button",
					"class" => "add-ingredient-btn"
				]
			)
			->setContent(content: "<i class='ri-add-line'></i> " . $pageLang->translate(key: "RECIPE_ADD_INGREDIENT"))
		;
		$form->addInput(input: $addIngredientBtn);


		$recipeLang = new Lang(filePath: "components/tiles/recipe");

		$optionsHtml = "";
		foreach (Type::cases() as $type) {
			$selected = (isset($pageData["recipe_type"]) && $pageData["recipe_type"] == $type->value) ? "selected" : "";
			$label = $recipeLang->translate(key: TypeFormat::format(type: $type->value));
			$optionsHtml .= "<option value='{$type->value}' {$selected}>{$label}</option>";
		}

		$select = new ElementBuilder ;
		$select
			->setElement(element: "select")
			->setAttributs(
				attributs: [
					"name" => "recipe_type",
					"required" => ""
				]
			)
			->setContent(content: $optionsHtml)
		;
		$form->addInput(input: $select);


		// difficulté
		$optionsHtml = "";
		foreach (Difficulty::cases() as $difficulty) {
			$selected = (isset($pageData["recipe_difficulty"]) && $pageData["recipe_difficulty"] == $difficulty->value) ? "selected" : "";
			$label = $recipeLang->translate(key: DifficultyFormat::format(difficulty: $difficulty->value));
			$optionsHtml .= "<option value='{$difficulty->value}' {$selected}>{$label}</option>";
		}

		$select = new ElementBuilder ;
		$select
			->setElement(element: "select")
			->setAttributs(
				attributs: [
					"name" => "recipe_difficulty",
					"required" => ""
				]
			)
			->setContent(content: $optionsHtml)
		;
		$form->addInput(input: $select);

		$submit = new ElementBuilder;
		$submit
			->setElement(element: "button")
			->setAttributs(
				attributs: [
					"type" => "submit"
				]
			)
			->setContent($pageLang->translate(key: "RECIPE_SUBMIT"))
		;
		$form->addInput(input: $submit);


		echo $form->build();

	?>

</div>

