<?php
	use App\Enums\Path;
	use App\Models\Repositories\UserRepository;
	use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
	$mainLang = new Lang(filePath: "main/role");
?>

<div class="users_container">
	<h1><?= $pageLang->translate(key: "USERS_TITLE") ?></h1>

	<table class="o">
		<thread>
			<tr>
				<th><?= $pageLang->translate(key: "USERS_NAME") ?></th>
				<th><?= $pageLang->translate(key: "USERS_EMAIL") ?></th>
				<th><?= $pageLang->translate(key: "USERS_ROLE") ?></th>
			</tr>
		</thread>
		<tbody>
			<?php
				foreach ($usersUid as $userUid){
					$user = new UserRepository()
						->setUid(uid: $userUid)
						->hydrate()
					;

					require Path::COMPONENT_TABLES->value . "/user.php";
				}
			?>
		</tbody>
	</table>
</div>
