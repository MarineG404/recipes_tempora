<?php
	use App\Enums\Path;
	use App\Models\Repositories\UserRepository;
	use Tempora\Utils\Lang;

	include Path::COMPONENT_ACTIONS->value . "/navbar.php";
	$mainLang = new Lang(filePath: "main/role");
?>

<div class="users_container">
	<h1><?= $pageLang->translate(key: "USERS_TITLE") ?></h1>

	<div class="user-cards">
		<?php
			foreach ($usersUid as $userUid){
				$user = new UserRepository()
					->setUid(uid: $userUid)
					->hydrate()
				;

				require Path::COMPONENT_TILES->value . "/user.php";
			}
		?>
	</div>
</div>
