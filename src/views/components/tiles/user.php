<div class="user">
	<p><?= $user->getName() . ' ' . $user->getSurname() ?></p>
	<p><?= $pageLang->translate(key: "USERS_EMAIL") ?> : <?= $user->getEmail() ?></p>
	<p><?= $pageLang->translate(key: "USERS_ROLE") ?> :
		<?php

        use App\Models\Repositories\UserRepository;
        use App\Utils\RoleFormat;

			foreach (UserRepository::getRoles(uid: $userUid) as $role) {
				echo $mainLang->translate(key: RoleFormat::format(role: $role)) . ' ';
			}
		?>
	</p>
</div>
