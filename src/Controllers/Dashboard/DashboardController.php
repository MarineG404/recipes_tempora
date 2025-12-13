<?php

namespace App\Controllers\Dashboard;

use App\Enums\Path;
use App\Enums\Role;
use Tempora\Attributes\RouteAttribute;
use Tempora\Controllers\Controller;
use Tempora\Utils\Lang;

class DashboardController extends Controller {
	#[RouteAttribute(
		path: "/dashboard",
		name: "app_dashboard_get",
		method: "GET",
		description: "Dashboard page",
		title: "DASHBOARD_TITLE",
		translateTitle: true,
		translateFile: "pages/dashboard",
		needLoginToBe: true,
		accessRoles: [
			Role::ADMINISTRATOR
		]
	)]

	public function render(): void {
		$pageData = $this->getPageData();
		$pageLang = new Lang(filePath: "pages/dashboard");

		$this->setStyles(styles: [
			"/assets/styles/main.css",
			"/assets/styles/remixicon.css"
		]);

		$this->setScripts(scripts: [
			"/assets/scripts/engine.js",
			"/assets/scripts/theme.js"
		]);

		require Path::LAYOUT->value . "/header.php";

		require Path::LAYOUT->value . "/dashboard/index.php";

		include Path::LAYOUT->value . "/footer.php";
	}
}
