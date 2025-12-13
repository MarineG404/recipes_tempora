<?php
	use Tempora\Utils\Lang;

	$componentResetLang = new Lang(filePath: "components/actions/reset_password_button");
?>

<a href="/login/reset"><?= $componentResetLang->translate(key: "PASSWORD_FORGOT") ?></a>
