<?php
	use App\Enums\Path;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
?>

<h1><?= $pageLang->translate(key: "INDEX_TITLE") ?></h1>
