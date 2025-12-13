<?php
	use App\Enums\Path;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
?>

<div class="login_reset_container">
	<h1><?= $pageLang->translate(key: "LOGIN_RESET_TITLE") ?></h1>

	<?php include Path::COMPONENT_FORMS->value . "/login_reset_form.php"; ?>
</div>
