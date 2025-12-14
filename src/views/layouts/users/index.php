<?php

use App\Enums\Path;
use App\Models\Repositories\UserRepository;
use App\Utils\RoleFormat;
use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
	$mainLang = new Lang(filePath: "main/role");
?>
<h1><?= $pageLang->translate(key: "USERS_TITLE") ?></h1>

<?php
	foreach ($usersUid as $userUid):
		$user = (new UserRepository())
			->setUid(uid: $userUid)
			->hydrate();
?>

<div class="user">
	<p><?= $user->getName() . ' ' . $user->getSurname() ?></p>
	<p><?= $pageLang->translate(key: "USERS_EMAIL") ?> : <?= $user->getEmail() ?></p>
	<p><?= $pageLang->translate(key: "USERS_ROLE") ?> :
		<?php
			foreach (UserRepository::getRoles(uid: $userUid) as $role) {
				echo $mainLang->translate(key: RoleFormat::format(role: $role)) . ' ';
			}
		?>
	</p>
</div>


<?php endforeach; ?>
