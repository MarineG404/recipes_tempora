<?php
	use App\Enums\Path;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
?>

<div class="reset_password_container">
	<h1><?= $pageLang->translate(key: "RESET_TITLE") ?></h1>

	<?php
		$oldPassword = false;
		include Path::COMPONENT_FORMS->value . "/update_password_form.php";
	?>
</div>
