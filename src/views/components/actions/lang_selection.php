<?php
	use App\Utils\NameFormat;
	use Tempora\Enums\Path;
	use Tempora\Utils\ElementBuilder\Select;
	use Tempora\Utils\Lang;
	use Tempora\Utils\System;
?>

<?php
	$componentLang = new Lang(filePath: "components/actions/lang_selection");

	$options = [];
	foreach (System::getFiles(path: Path::APP_ASSETS_MIN->value . "/langs") as $file) {
		$options[$file] = NameFormat::langFormat(name: $file);
	}

	$select = new Select;
	$select
		->setAttributs(
			attributs: [
				"class" => "lang_selection",
				"id" => "lang_selection",
				"aria-label" => $componentLang->translate(key: "ACCESSIBILITY_LANG"),
			]
		)
		->setOptions(options: $options)
		->setSelected(selected: $_COOKIE["LANG"])
		->setTranslate(translate: false)
	;
?>

<?= $select->build() ?>
