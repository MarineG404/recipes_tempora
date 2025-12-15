<?php

namespace App\Controllers\Users;

use App\Models\Repositories\UserRepository;
use Tempora\Attributes\RouteAttribute;
use Tempora\Controllers\Controller;
use App\Enums\Role;
use Tempora\Utils\Lang;

class UsersController extends Controller {
	#[RouteAttribute(
		path: "/users",
		name: "app_users_get",
		method: "GET",
		description: "Users page",
		title: "USERS_TITLE",
		translateTitle: true,
		translateFile: "pages/users",
		needLoginToBe: true,
		accessRoles: [Role::ADMINISTRATOR],
	)]

	public function render(): void {
		$pageData = $this->getPageData();
		$pageLang = new Lang(filePath: "pages/users");

		$usersUid = UserRepository::getUsers();

		$this->setStyles(styles: [
			"/assets/styles/main.css",
			"/assets/styles/users/users.css",
			"/assets/styles/remixicon.css"
		]);

		$this->setScripts(scripts: [
			"/assets/scripts/engine.js",
			"/assets/scripts/theme.js"
		]);

		require \App\Enums\Path::LAYOUT->value . "/header.php";

		require \App\Enums\Path::LAYOUT->value . "/users/index.php";

		include \App\Enums\Path::LAYOUT->value . "/footer.php";
	}

}
