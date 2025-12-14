<?php
	use App\Models\Repositories\UserRepository;
	use App\Utils\RoleFormat;
?>

<div class="user">
	<p><?= $user->getName() . ' ' . $user->getSurname() ?></p>
	<p><?= $pageLang->translate(key: "USERS_EMAIL") ?> : <?= $user->getEmail() ?></p>
	<p><?= $pageLang->translate(key: "USERS_ROLE") ?> :
		<?php
			foreach (UserRepository::getRoles(uid: $user->getUid()) as $role) { ?>
				 <?= $mainLang->translate(key: RoleFormat::format(role: $role)) . ' ' ?>
			<?php }
		?>
	</p>
</div>
