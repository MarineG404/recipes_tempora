<?php

use App\Enums\Path;
use App\Utils\RoleFormat;
use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
	$mainLang = new Lang(filePath: "main/role");
	$mainLangActions = new Lang(filePath: "main/actions");
?>

<div class="profile_container">

	<h1><?= $pageLang->translate(key: "PROFILE_TITLE") ?></h1>

	<div class="profile">

		<div class="profile_item">
			<p><?= $userRepository->getName() . ' ' .  strtoupper(string: $userRepository->getSurname()) ?></p>
		</div>
		<div class="profile_item">
			<p><?= $userRepository->getEmail() ?></p>
		</div>
		<div class="profile_item">
			<?php
				foreach (USER_ROLES as $role) {
					?>
					<p><?= $mainLang->translate(key: RoleFormat::format(role: $role)) ?></p>
					<?php
				}
			?>
		</div>

		<div class="actions">
			<button class="update"><?= $mainLangActions->translate(key: "MAIN_UPDATE") ?></button>
			<button class="delete"><?= $mainLangActions->translate(key: "MAIN_DELETE") ?></button>
		</div>
	</div>
</div>

