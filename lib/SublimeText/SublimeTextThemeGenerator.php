<?php

namespace Odepax\MarsPeacock\SublimeText;

require_once("lib/ThemeGenerator.php");
require_once("lib/ThemeConfiguration.php");

use \Odepax\MarsPeacock\ThemeGenerator;
use \Odepax\MarsPeacock\ThemeConfiguration;

class SublimeTextThemeGenerator implements ThemeGenerator
{
	private $sets;

	function __construct()
	{
		$this->sets = [
			"default" => [
				"comment" => implode(", ", [
					"comment",
					"comment punctuation"
				]),
				"keyword" => implode(", ", [
					"keyword",
					"variable.language",
					"storage"
				]),
				"type" => implode(", ", [
					"entity.name.class",
					"entity.name.interface",
					"entity.other.inherited-class"
				]),
				"constant" => implode(", ", [
					"constant",
					"string",
					"string punctuation"
				]),
				"punctuation" => implode(", ", [
					"punctuation"
				]),
				"symbol" => implode(", ", [
					"constant.other.placeholder",
					"constant.character.escape"
				])
			],
			"xml" => [
				"comment" => implode(", ", [
					"text.xml comment",
					"text.html comment",
					"text.xml comment punctuation",
					"text.html comment punctuation"
				]),
				"keyword" => implode(", ", [
					"text.xml keyword",
					"text.html keyword",
					"text.xml variable.language",
					"text.html variable.language",
					"text.xml storage",
					"text.html storage"
				]),
				"punctuation" => implode(", ", [
					"text.html punctuation",
					"text.xml punctuation"
				]),
				"symbol" => implode(", ", [
					"text.html constant.other.placeholder",
					"text.xml constant.other.placeholder",
					"text.html constant.character.escape",
					"text.xml constant.character.escape",
					"text.xml punctuation.definition.tag",
					"text.html punctuation.definition.tag",
					"text.xml punctuation.separator.key-value",
					"text.html punctuation.separator.key-value",
					"text.xml punctuation.separator.namespace",
					"text.xml meta.tag.sgml.doctype punctuation.definition.tag",
					"text.xml meta.tag.sgml.doctype keyword.doctype",
					"text.xml meta.tag.sgml.doctype keyword.entity",
					"text.xml meta.tag.sgml.doctype keyword.element",
					"text.xml meta.tag.sgml.doctype keyword.attlist",
					"text.html meta.tag.sgml.doctype entity.name.tag.doctype",
					"text.xml meta.tag.preprocessor punctuation.definition.tag",
					"text.xml meta.tag.preprocessor punctuation.separator.key-value"
				]),
				"type" => implode(", ", [
					"text.xml entity.name.tag.localname",
					"text.xml entity.other.attribute-name.localname",
					"text.xml meta.tag.sgml.doctype variable.documentroot",
					"text.xml meta.tag.sgml.doctype variable.element",
					"text.xml meta.tag.sgml.doctype variable.attribute-name",
					"text.html meta.tag.sgml meta.tag.sgml.doctype",
					"text.html entity.name.tag",
					"text.html entity.other.attribute-name"
				]),
				"constant" => implode(", ", [
					"text.xml meta.tag.preprocessor",
					"text.xml meta.tag.sgml.doctype",
					"text.xml constant.character.entity",
					"text.html constant.character.entity",
					"text.xml meta.tag.sgml.doctype punctuation.definition.constant",
					"text.xmlconstant",
					"text.html constant",
					"text.xmlstring",
					"text.html string",
					"text.xmlstring punctuation",
					"text.html string punctuation"
				])
			],
			"php" => [
				"comment" => implode(", ", [
					"source.php comment",
					"source.php comment punctuation"
				]),
				"keyword" => implode(", ", [
					"source.php keyword",
					"source.php variable.language",
					"source.php storage"
				]),
				"type" => implode(", ", [
					"source.php entity.name.class",
					"source.php entity.name.interface",
					"source.php entity.other.inherited-class",
					"source.php entity.name.namespace",
					"source.php support.other.namespace",
					"source.php support.class"
				]),
				"constant" => implode(", ", [
					"source.php constant",
					"source.php string",
					"source.php string punctuation"
				]),
				"punctuation" => implode(", ", [
					"source.php punctuation"
				]),
				"symbol" => implode(", ", [
					"source.php constant.other.placeholder",
					"source.php constant.character.escape",
					"source.php support.function"
				])
			]
		];
	}

	function generate(ThemeConfiguration $settings)
	{
		ob_start();

		?><?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<!--
See http://manual.macromates.com/en/language_grammars
See http://docs.sublimetext.info/en/latest/reference/color_schemes.html
-->
<plist version="1.0">
<dict>
<key>name</key>
<string><?= $settings->name ?></string>
<key>settings</key>
<array>
<dict>
	<key>settings</key>
	<dict>
		<key>foreground</key><string><?= $settings->default->overall->color->toHex() ?></string>
		<key>background</key><string><?= $settings->default->overall->background->toHex() ?></string>
		<key>caret</key><string><?= $settings->default->overall->color->toHex() ?></string>
		<key>lineHighlight</key><string>#222222</string>
		<key>selection</key><string>#9D550F88</string>
		<key>selectionBorder</key><string>#222222</string>
		<key>findHighlight</key><string>#FFE792</string>
		<key>findHighlightForeground</key><string>#000000</string>
		<key>guide</key><string>#77777788</string>
		<key>activeGuide</key><string>#9D550F88</string>
		<key>tagsOptions</key><string>stippled_underline</string>
		<key>bracketsForeground</key><string>#F8F8F2A5</string>
		<key>bracketsOptions</key><string>underline</string>
		<key>bracketContentsForeground</key><string>#F8F8F2A5</string>
		<key>bracketContentsOptions</key><string>underline</string>
	</dict>
</dict>

<?php foreach ($this->sets as $set => $scopes): ?>
	<?php foreach ($scopes as $scope => $sublimeTextScope): ?>
		<dict>
			<key>scope</key><string><?= $sublimeTextScope ?></string>
			<key>settings</key>
			<dict>
				<key>foreground</key>
				<string><?= $settings->$set->$scope->color->toHex() ?></string>
			</dict>
		</dict>
	<?php endforeach ?>
<?php endforeach ?>

</array>
</dict>
</plist>
<?php

		$output = ob_get_clean();

		if (file_put_contents(str_replace(" ", "", $settings->name) . ".tmTheme", $output)) {
			echo "Youpi.";
		} else {
			echo "Awch...";
		}
	}
}
