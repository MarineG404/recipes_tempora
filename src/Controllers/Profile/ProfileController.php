<?php


namespace App\Controllers\Profile;

use App\Enums\Path;
use App\Models\Repositories\UserRepository;
use Tempora\Attributes\RouteAttribute;
use Tempora\Controllers\Controller;
use Tempora\Utils\Lang;

class ProfileController extends Controller {
	#[RouteAttribute(
		path: "/profile",
		name: "app_profile_get",
		method: "GET",
		description: "Profile page",
		title: "PROFILE_TITLE",
		translateTitle: true,
		translateFile: "pages/profile",
		needLoginToBe: true,
		accessRoles: []
	)]

	public function render(): void {
		$pageData = $this->getPageData();
		$pageLang = new Lang(filePath: "pages/profile");

		$userUid = $_SESSION["user"]["uid"];
		$userRepository = new UserRepository();
		$userRepository->setUid(uid: $userUid);
		$userRepository->hydrate();

		$this->setStyles(styles: [
			"/assets/styles/main.css",
			"/assets/styles/remixicon.css"
		]);

		$this->setScripts(scripts: [
			"/assets/scripts/engine.js",
			"/assets/scripts/theme.js"
		]);

		require Path::LAYOUT->value . "/header.php";

		require Path::LAYOUT->value . "/profile/index.php";

		include Path::LAYOUT->value . "/footer.php";
	}

}
