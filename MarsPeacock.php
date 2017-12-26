<?php 

define("BLACK",           "#161413");
define("DARK",            "#2E2B28");
define("GREY",            "#85877D");
define("LIGHT",           "#B8B9A9");
define("WHITE",           "#EDE7CB");

define("RED",             "#F84439");
define("ORANGE",          "#FEA92C");
define("YELLOW",          "#FFF086");
define("GREEN",           "#ADE831");
define("TEAL",            "#1DD494");
define("BLUE",            "#4DB3ED");
define("PURPLE",          "#B191E9");

define("BOLD",            0b00000001);
define("ITALIC",          0b00000010);
define("UNDERLINE_SOLID", 0b00000100);
define("UNDERLINE_DASH",  0b00001000);
define("UNDERLINE_WAVE",  0b00001100);

define("MASK_BOLD",       0b00000001);
define("MASK_ITALIC",     0b00000010);
define("MASK_UNDERLINE",  0b00001100);

$scopes = [
	"programming:preprocessor"  => [ "color" => PURPLE ],
	"programming:keyword"       => [ "color" => BLUE ],
	"programming:type"          => [ "color" => ORANGE ],
	"programming:namespace"     => [ "color" => TEAL ],
	"programming:comment"       => [ "color" => GREY ],
	"programming:symbol"        => [ "color" => RED ],
	"programming:constant"      => [ "color" => GREEN ],
	"programming:builtin"       => [ "color" => YELLOW ],
	"programming:punctuation"   => [ "color" => LIGHT ],
	
	"documentation:tag"         => [ "color" => PURPLE ],
	"documentation:punctuation" => [ "color" => BLUE ],
	"documentation:constant"    => [ "color" => LIGHT ],
	
	"markup:italic"             => [ "color" => YELLOW, "styles" => ITALIC ],
	"markup:italic:punctuation" => [ "color" => RED, "styles" => ITALIC ],
	"markup:bold"               => [ "color" => ORANGE ],
	"markup:bold:punctuation"   => [ "color" => RED, "styles" => BOLD ],
	"markup:link"               => [ "color" => BLUE, "styles" => ITALIC ],

	"diff:deleted"              => [ "color" => RED ],
	"diff:inserted"             => [ "color" => GREEN ],
	"diff:changed"              => [ "color" => BLUE ],
	"diff:ignored"              => [ "color" => GREY ]
];

$languages = [
	"*" => [
		"programming:comment" => [
			"comment",
			"comment punctuation"
		],
		"programming:constant" => [
			"constant",
			"string",
			"string punctuation"
		],
		"programming:type" => [
			"entity.name.class",
			"entity.name.interface",
			"entity.other.inherited-class"
		],
		"programming:keyword" => [
			"keyword",
			"variable.language",
			"storage"
		],
		"programming:symbol" => [
			"constant.other.placeholder",
			"constant.character.escape"
		],
		"programming:punctuation" => [
			"punctuation"
		],
	],
	"XML n HTML" => [
		"programming:symbol" => [
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
			"text.xml meta.tag.preprocessor punctuation.separator.key-value",
		],
		"programming:preprocessor" => [
			"text.xml meta.tag.preprocessor entity.name.tag",
			"text.xml meta.tag.preprocessor entity.other.attribute-name.localname",
			"text.xml constant.character.entity punctuation.definition.constant",
			"text.html constant.character.entity punctuation.definition.entity"
		],
		"programming:type" => [
			"text.xml entity.name.tag.localname",
			"text.xml entity.other.attribute-name.localname",
			"text.xml meta.tag.sgml.doctype variable.documentroot",
			"text.xml meta.tag.sgml.doctype variable.element",
			"text.xml meta.tag.sgml.doctype variable.attribute-name",
			"text.html meta.tag.sgml meta.tag.sgml.doctype",
			"text.html entity.name.tag",
			"text.html entity.other.attribute-name",
		],
		"programming:namespace" => [
			"text.xml entity.name.tag.namespace",
			"text.xml entity.other.attribute-name.namespace"
		],
		"programming:constant" => [
			"text.xml meta.tag.preprocessor",
			"text.xml meta.tag.sgml.doctype",
			"text.xml constant.character.entity",
			"text.html constant.character.entity",
			"text.xml meta.tag.sgml.doctype punctuation.definition.constant"
		]
	],
	"CSS n SCSS" => [
		"programming:preprocessor" => [
			"source.scss variable",
			"source.scss meta.at-rule.mixin entity.name.function",
			"source.scss meta.at-rule.include support.function",
			"source.scss entity.other.attribute-name.placeholder"
		],
		"programming:keyword" => [
			"source.css meta.property-name",
			"source.scss meta.property-name",
			"source.css meta.at-rule keyword.control punctuation.definition.keyword",
			"source.scss meta.at-rule punctuation.definition.keyword",
			"source.css meta.at-rule keyword.control",
			"source.scss meta.at-rule",
			"source.css meta.at-rule support.type.property-name",
			"source.css keyword.other",
			"source.scss keyword.other"
		],
		"programming:type" => [
			"source.css keyword.other.unit",
			"source.scss keyword.other.unit",
			"source.css entity.name.tag",
			"source.scss entity.name.tag",
			"source.css entity.other.attribute-name",
			"source.scss entity.other.attribute-name"
		],
		"programming:symbol" => [
			"source.css entity.other.attribute-name punctuation.definition.entity",
			"source.scss entity.other.attribute-name punctuationctuation.definition.entity",
			"source.scss entity.other.attribute-name punctuation.definition.entity",
			"source.css entity.other.pseudo-class punctuation.definition.entity",
			"source.css entity.other.pseudo-element punctuation.definition.entity",
			"source.css keyword.operator.attribute-selector",
			"source.scss punctuation.separator.operator",
			"source.css meta.at-rule keyword.operator.logic"
		],
		"programming:constant" => [
			"source.css meta.property-value",
			"source.scss meta.property-value",
			"source.css constant.other.color punctuation.definition.constant",
			"source.scss constant.other.color punctuation.definition.constant",
			"source.scss variable.interpolation variable",
			"source.scss meta.at-rule.import variable.parameter.url"
		],
		"programming:builtin" => [
			"source.css support.function",
			"source.css support.constant.property-value",
			"source.css entity.other.pseudo-element",
			"source.css entity.other.pseudo-class",
			"source.css meta.at-rule support.constant",
			"source.scss support.function",
			"source.scss support.constant.property-value",
			"source.scss entity.other.pseudo-element",
			"source.scss entity.other.pseudo-class",
			"source.scss entity.other.attribute-name.pseudo-class",
			"source.scss entity.other.attribute-name.pseudo-element",
			"source.scss meta.at-rule support.constant"
		],
		"programming:punctuation" => [
			"source.css punctuation.separator.key-value",
			"source.css punctuation.terminator.rule",
			"source.css punctuation.section.property-list",
			"source.css punctuation.definition.group",
			"source.css punctuation.definition.entity",
			"source.scss punctuation.separator.key-value",
			"source.scss punctuation.terminator.rule",
			"source.scss punctuation.section.property-list",
			"source.scss punctuation.section.function",
			"source.scss punctuation.definition.entity"
		]
	],
	"EcmaScript" => [
		"programming:keyword" => [
			"source.js support.constant.prototype",
			"source.js support.type.object.node"
		],
		"programming:namespace" => [
			"source.json meta.structure.dictionary.key string",
			"source.js meta.object-literal.key",
			"source.js meta.object-literal.key string",
			"source.js meta.object-literal.key constant.numeric",
			"punctuation.definition.character-class.regexp"
		],
		"programming:type" => [
			"source.js variable.type",
			"source.js support.class",
		],
		"programming:symbol" => [
			"constant.other.character-class.escape.backslash.regexp"
		],
		"programming:builtin" => [
			"source.js support.type.object.dom",
			"source.js support.type.object.console",
			"source.json constant.language",
			"punctuation.definition.group.regexp"
		],
		"programming:punctuation" => [
			"source.js meta.object-literal punctuation.separator.key-value"
		]
	],
	"PHP" => [
		"documentation:tag" => [
			"source.php keyword.other.phpdoc"
		],
		"programming:preprocessor" => [
			"embedding.php punctuation.section.embedded"
		],
		"programming:builtin" => [
			"source.php support.function"
		],
		"programming:namespace" => [
			"source.php entity.name.namespace",
			"source.php support.other.namespace"
		],
		"programming:type" => [
			"source.php support.class"
		]
	],
	"Java" => [
		"documentation:tag" => [
			"source.java keyword.other.documentation",
			"source.java variable.annotation"
		],
		"documentation:punctuation" => [
			"source.java keyword.other.documentation punctuation.definition.keyword",
			"source.java punctuation.definition.annotation"
		],
		"programming:builtin" => [
			"source.java support.variable.magic"
		],
		"programming:namespace" => [
			"source.java support.other.package",
			"source.java support.class.import"
		],
		"programming:type" => [
			"source.java meta.method.return-type",
			"source.java support.class"
		]
	],
	"C#" => [
		"programming:type" => [
			"source.cs support.type",
			"source.cs entity.name.enum",
			"source.cs entity.name.class",
			"source.cs entity.name.interface",
		],
		"programming:namespace" => [
			"source.cs entity.name.namespace",
			"source.cs meta.path",
		],
		"documentation:tag" => [
			"source.cs variable.annotation",
			"source.cs comment.block.documentation entity.name.tag",
			"source.cs comment.block.documentation entity.other.attribute-name"
		],
		"documentation:punctuation" => [
			"source.cs punctuation.definition.annotation",
			"source.cs comment.block.documentation punctuation.definition.tag",
			"source.cs comment.block.documentation punctuation.separator.argument",
		],
		"documentation:constant" => [
			"source.cs comment.block.documentation string",
		],
	],
	"C n C++" => [
		"programming:preprocessor" => [
			"source.c meta.preprocessor keyword.control",
			"source.c++ meta.preprocessor keyword.control"
		],
		"programming:constant" => [
			"source.c meta.preprocessor.macro",
			"source.c++ meta.preprocessor.macro"
		]
	],
	"Markdown" => [
		"programming:preprocessor" => [
			"markup.raw constant.other.language-name",
		],
		"programming:type" => [
			"markup.heading entity.name.section",
			"meta.table.header",
		],
		"programming:namespace" => [
			"meta.link.inline.description",
			"meta.image.inline.description",
		],
		"programming:comment" => [
			"punctuation.definition.thematic-break.markdown"
		],
		"programming:symbol" => [
			"markup punctuation.definition.heading",
			"markup.raw",
			"markup.raw punctuation.definition.raw",
			"markup.list.unnumbered.bullet punctuation.definition.list_item",
			"markup.list.numbered.bullet punctuation.definition.list_item",
			"markup.list.numbered.bullet",
			"markup punctuation.definition.heading",
			"meta.table.header.markdown punctuation.separator.table-cell",
			"meta.table.markdown punctuation.separator.table-cell",
			"meta.table.header-separator punctuation.separator.table-cell",
			"meta.table.header-separator punctuation.section.table-header",
			"meta.table.header-separator punctuation.definition.table-cell-alignment",
		],
		"programming:constant" => [
			"markup.quote",
			"markup.quote punctuation.definition.blockquote"
		],
		"markup:italic:punctuation" => [
			"markup.italic punctuation.definition.italic"
		],
		"markup:italic" => [
			"markup.italic",
		],
		"markup:bold:punctuation" => [
			"markup.bold punctuation.definition.bold"
		],
		"markup:bold" => [
			"markup.bold",
		],
		"markup:link" => [
			"markup.underline.link",
		],
	],
	"Brackets Highlighter" => [
		"programming:builtin" => [
			"brackethighlighter.curly",
			"brackethighlighter.round",
			"brackethighlighter.square",
		],
		"programming:symbol" => [
			"brackethighlighter.tag",
			"brackethighlighter.angle",
		],
		"programming:constant" => [
			"brackethighlighter.quote",
		],
		"programming:comment" => [
			"brackethighlighter.unmatched",
		]
	],
	"Git Gutters" => [
		"diff:inserted" => [
			"markup.inserted",
			"markup.inserted punctuation.definition.inserted"
		],
		"diff:deleted" => [
			"markup.deleted",
			"markup.deleted punctuation.definition.deleted"
		],
		"diff:changed" => [
			"markup.changed",
			"markup.changed punctuation.definition.changed"
		],
		"diff:ignored" => [
			"markup.ignored",
			"markup.untracked",
			"markup.ignored punctuation.definition.ignored",
			"markup.untracked punctuation.definition.untracked"
		]
	]
];


$compiledScopes = [];

foreach ($languages as $language) {
	foreach ($language as $scope => $mapping) {
		if (!array_key_exists($scope, $compiledScopes)) {
			$compiledScopes[$scope] = [];
		}
		
		$compiledScopes[$scope][] = implode(", ", $mapping);
	}
}

ob_start();

?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<!--
See http://manual.macromates.com/en/language_grammars
See http://docs.sublimetext.info/en/latest/reference/color_schemes.html
-->
<plist version="1.0">
<dict>
<key>name</key>
<string>Mars Peacock</string>
<key>settings</key>
<array>
<dict>
	<key>settings</key>
	<dict>
		<key>foreground</key><string><?= WHITE ?></string>
		<key>background</key><string><?= DARK ?></string>
		<key>caret</key><string><?= WHITE ?></string>
		<key>lineHighlight</key><string><?= BLACK ?></string>
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

<?php foreach ($scopes as $scope => $styles): ?>
	<?php if (array_key_exists($scope, $compiledScopes)): ?>
		<dict>
			<key>scope</key><string><?= implode(", ", $compiledScopes[$scope]) ?></string>
			<key>settings</key>
			<dict>
				<?php foreach ($styles as $key => $value): ?>
					<?php switch ($key) {
						case "color":
							echo "<key>foreground</key>";
							echo "<string>$value</string>";
							break;
						case "background":
							echo "<key>background</key>";
							echo "<string>$value</string>";
							break;
						case "styles":
							echo "<key>fontStyle</key>";
							echo "<string>";
							if (($value & MASK_BOLD)      == BOLD)            echo " bold";
							if (($value & MASK_ITALIC)    == ITALIC)          echo " italic";
							if (($value & MASK_UNDERLINE) == UNDERLINE_SOLID) echo " underline";
							if (($value & MASK_UNDERLINE) == UNDERLINE_DASH)  echo " stippled_underline";
							if (($value & MASK_UNDERLINE) == UNDERLINE_WAVE)  echo " stippled_underline";
							echo "</string>";
							break;
						default:
							break;
					} ?>
				<?php endforeach ?>
			</dict>
		</dict>
	<?php endif ?>
<?php endforeach ?>
</array>
</dict>
</plist>

<?php

$output = ob_get_clean();

if (file_put_contents("MarsPeacock.tmTheme", $output)) {
	echo "Youpi.";
} else {
	echo "Awch...";
}
