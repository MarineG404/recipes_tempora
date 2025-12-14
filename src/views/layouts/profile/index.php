<?php

use App\Enums\Path;
use App\Utils\RoleFormat;
use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
	$mainLang = new Lang(filePath: "main/role");
?>
<h1><?= $pageLang->translate(key: "PROFILE_TITLE") ?></h1>

<div class="profile">
	<p><?= $userRepository->getName() . ' ' . $userRepository->getSurname() ?></p>
	<p><?= $userRepository->getEmail() ?></p>

	<?php
	foreach (USER_ROLES as $role) {
		?>
		<p><?= $mainLang->translate(key: RoleFormat::format(role: $role)) ?></p>
		<?php
	}
	?>
</div>
