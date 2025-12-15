<?php
	use App\Models\Repositories\UserRepository;
	use App\Utils\RoleFormat;
?>

<tr>
	<td>
		<?= $user->getName() . ' ' . strtoupper(string: $user->getSurname()) ?>
	</td>
	<td>
		<?= $user->getEmail() ?>
	</td>
	<td>
		<?php
			foreach (UserRepository::getRoles(uid: $user->getUid()) as $role) { ?>
				<?= $mainLang->translate(key: RoleFormat::format(role: $role)) . ' ' ?>
			<?php }
		?>
	</td>
	<td>
		 <button><?= $pageLang->translate(key: "USERS_EDIT_BUTTON") ?></button> <button><?= $pageLang->translate(key: "USERS_DELETE_BUTTON") ?></button>
	</td>
</tr>

