<?php
	use Tempora\Utils\ElementBuilder\ElementBuilder;
	use Tempora\Utils\ElementBuilder\Form;
	use Tempora\Utils\Lang;

	$componentResetLang = new Lang(filePath: "components/forms/update_password_form");

	$form = new Form();
	$form
		->setAttributs(
			attributs: [
				"method" => "POST",
				"class"	=> "update_password"
			]
		)
		->setCsrf(csrf: true)
	;

	if (!isset($oldPassword) || $oldPassword != false) {
		$input = new ElementBuilder;
		$input
			->setElement(element: "input")
			->setAttributs(
				attributs: [
					"type" => "password",
					"name" => "old_password",
					"value" => $pageData["form_update_old_password"] ?? "",
					"placeholder" => $componentResetLang->translate(key: "OLD_PASSWORD")
				]
			)
		;
		$form->addInput(input: $input);
	}

	$input = new ElementBuilder;
	$input
		->setElement(element: "input")
		->setAttributs(
			attributs: [
				"type" => "password",
				"name" => "new_password",
				"value" => $pageData["form_update_new_password"] ?? "",
				"placeholder" => $componentResetLang->translate(key: "NEW_PASSWORD")
			]
		)
	;
	$form->addInput(input: $input);

	$input = new ElementBuilder;
	$input
		->setElement(element: "input")
		->setAttributs(
			attributs: [
				"type" => "password",
				"name" => "new_password_confirm",
				"value" => $pageData["form_update_new_password_confirm"] ?? "",
				"placeholder" => $componentResetLang->translate(key: "CONFIRM")
			]
		)
	;
	$form->addInput(input: $input);

	$submit = new ElementBuilder;
	$submit
		->setElement(element: "button")
		->setAttributs(
			attributs: [
				"type" => "submit"
			]
		)
		->setContent(content: $componentResetLang->translate(key: "SUBMIT"))
	;
	$form->addInput(input: $submit);

	echo $form->build();
