<?php
	use App\Enums\Path;
	use App\Enums\Role;
	use Tempora\Utils\Cache\Route;
	use Tempora\Utils\ElementBuilder\ElementBuilder;
	use Tempora\Utils\Lang;
	use Tempora\Utils\Minifier\Image;

	$componentNavbarLang = new Lang(filePath: "components/actions/navbar");
?>

<nav>
	<?=
		(new ElementBuilder)
			->setElement(element: "a")
			->setAttributs(
				attributs: [
					"href" => Route::getPath(name: "app_home_get"),
					"title" => APP_NAME,
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "img")
					->setAttributs(
						attributs: [
							"src" => Image::import(image: "tempora.png"),
							"width" => "18",
							"alt" => APP_NAME,
						]
					)
					->build()
			)
			->build()
	?>

	<?=
		(new ElementBuilder())
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "item",
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "a")
					->setAttributs(
						attributs: [
							"class" => "button button_secondary",
							"href" => Route::getPath(name: "app_home_get"),
							"title" => $componentNavbarLang->translate(key: "NAVBAR_HOME"),
						]
					)
					->setContent(content: "<i class='ri-home-2-line'></i> " . $componentNavbarLang->translate(key: "NAVBAR_HOME"))
					->build()
				)
			->build()
	?>


	<?=
		(new ElementBuilder())
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "item",
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "a")
					->setAttributs(
						attributs: [
							"class" => "button button_secondary",
							"href" => Route::getPath(name: "app_recipes_get"),
							"title" => $componentNavbarLang->translate(key: "NAVBAR_RECIPES"),
						]
					)
					->setContent(content: "<i class='ri-book-2-line'></i> " . $componentNavbarLang->translate(key: "NAVBAR_RECIPES"))
					->build()
			)
			->build()
	?>

	<?=
		(new ElementBuilder())
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "item",
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "a")
					->setAttributs(
						attributs: [
							"class" => "button button_secondary",
							"href" => Route::getPath(name: "app_users_get"),
						]
					)
					->setContent(content: "<i class='ri-group-line'></i>")
					->build()
			)
			->setAccessRoles(accessRoles: [Role::ADMINISTRATOR->value])
			->build()

	?>

	<?=
		(new ElementBuilder())
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "item",
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "a")
					->setAttributs(
						attributs: [
							"class" => "button button_secondary",
							"href" => Route::getPath(name: "app_account_disconnect_get"),
							"title" => $componentNavbarLang->translate(key: "NAVBAR_DISCONNECT"),
						]
					)
					->setContent(content: "<i class='ri-logout-box-line'></i>")
					->build()
			)
			->setNeedLoginToBe(needLoginToBe: true)
			->build()
	?>

	<?=
		(new ElementBuilder())
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "item",
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "a")
					->setAttributs(
						attributs: [
							"class" => "button button_secondary",
							"href" => Route::getPath(name: "app_account_login_get"),
							"title" => $componentNavbarLang->translate(key: "NAVBAR_LOGIN"),
						]
					)
					->setContent(content: "<i class='ri-login-box-line'></i> " . $componentNavbarLang->translate(key: "NAVBAR_LOGIN"))
					->build()
			)
			->setAccessRoles(accessRoles: [])
			->setNeedLoginToBe(needLoginToBe: false)
			->build()
	?>

	<?=
		(new ElementBuilder())
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "item",
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "a")
					->setAttributs(
						attributs: [
							"class" => "button button_secondary",
							"href" => Route::getPath(name: "app_account_register_get"),
							"title" => $componentNavbarLang->translate(key: "NAVBAR_REGISTER"),
						]
					)
					->setContent(content: "<i class='ri-user-add-line'></i> " . $componentNavbarLang->translate(key: "NAVBAR_REGISTER"))
					->build()
			)
			->setAccessRoles(accessRoles: [])
			->setNeedLoginToBe(needLoginToBe: false)
			->build()
	?>

	<?=
		(new ElementBuilder)
			->setElement(element: "i")
			->setAttributs(
				attributs: [
					"class" => "ri-sun-line",
					"id" => "theme_button",
				]
			)
			->build()
	?>

	<?php include Path::COMPONENT_ACTIONS->value . "/lang_selection.php"; ?>

	<?=
		(new ElementBuilder())
			->setElement(element: "div")
			->setAttributs(
				attributs: [
					"class" => "item",
				]
			)
			->setContent(content:
				(new ElementBuilder)
					->setElement(element: "a")
					->setAttributs(
						attributs: [
							"class" => "button button_secondary",
							"href" => Route::getPath(name: "app_profile_get"),
							"title" => $componentNavbarLang->translate(key: "NAVBAR_PROFILE"),
						]
					)
					->setContent(content: "<i class='ri-user-line'></i> " . $componentNavbarLang->translate(key: "NAVBAR_PROFILE"))
					->build()
			)
			->setAccessRoles(accessRoles: [])
			->setNeedLoginToBe(needLoginToBe: true)
			->build()
	?>
</nav>
