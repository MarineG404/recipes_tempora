<?php
	use App\Models\Repositories\UserRepository;
	use App\Utils\RoleFormat;

?>

<div class="user_card">
	<h3>
		<?= ucfirst(htmlspecialchars(string: $user->getName() ?? "")) . ' ' . strtoupper(string: $user->getSurname() ?? "") ?>
	</h3>

	<div class="user-meta">
		<div class="meta-item">
			<i class="ri-mail-line"></i>
			<span><?= htmlspecialchars(string: $user->getEmail() ?? "") ?></span>
		</div>

		<div class="meta-item">
			<i class="ri-shield-user-line"></i>
			<?php foreach (UserRepository::getRoles(uid: $user->getUid()) as $role) { ?>
				<span class="role_badge"><?= $mainLang->translate(key: RoleFormat::format(role: $role)) ?></span>
			<?php } ?>
		</div>
	</div>

	<div class="actions">
		<button class="edit_btn">
			<i class="ri-edit-line"></i>
			<?= $pageLang->translate(key: "USERS_EDIT_BUTTON") ?>
		</button>
		<button class="delete_btn">
			<i class="ri-delete-bin-line"></i>
			<?= $pageLang->translate(key: "USERS_DELETE_BUTTON") ?>
		</button>
	</div>
</div>
