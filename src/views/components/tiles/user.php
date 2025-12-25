<?php
	use App\Models\Repositories\UserRepository;
	use App\Utils\RoleFormat;

?>

<div class="user_card">
	<div class="item">
		<?= $user->getName() . ' ' . strtoupper(string: $user->getSurname()) ?>
	</div>
	<div class="item">
		<?= $user->getEmail() ?>
	</div>
	<div class="item">
		<?php foreach (UserRepository::getRoles(uid: $user->getUid()) as $role) { ?>
			<span class="role_badge"><?= $mainLang->translate(key: RoleFormat::format(role: $role)) ?></span>
		<?php } ?>
	</div>
	<div class="actions">
		<button class="edit_btn"><?= $pageLang->translate(key: "USERS_EDIT_BUTTON") ?></button>
		<button class="delete_btn"><?= $pageLang->translate(key: "USERS_DELETE_BUTTON") ?></button>
	</div>
</div>
