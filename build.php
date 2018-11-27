<?php

require_once "lib/Color.php";
require_once "lib/FontStyle.php";
require_once "lib/SelectionCornerStyle.php";
require_once "lib/MatchingBracketsStyle.php";
require_once "lib/Theme.php";
require_once "lib/build.php";

function section($name, $configuration) { $configuration(); }

$theme = new Theme();

$theme->name = "Venus Peacock";

$theme->colors["red"] = Color::hexa("#F84439");
$theme->colors["alphaRed"] = Color::hexa("#F8443944");
$theme->colors["orange"] = Color::hexa("#FEA92C");
$theme->colors["yellow"] = Color::hexa("#FFF086");
$theme->colors["green"] = Color::hexa("#ADE831");
$theme->colors["teal"] = Color::hexa("#1DD494");
$theme->colors["blue"] = Color::hexa("#4DB3ED");
$theme->colors["pink"] = Color::hexa("#FD72C1");
$theme->colors["purple"] = Color::hexa("#C1A1E9");
$theme->colors["white"] = Color::hexa("#F3F0E2");
$theme->colors["light"] = Color::hexa("#C2C3BB");
$theme->colors["grey"] = Color::hexa("#85877D");
$theme->colors["alphaGrey"] = Color::hexa("#85877D44");
$theme->colors["dark"] = Color::hexa("#1D1B1A");
$theme->colors["black"] = Color::hexa("#090807");

$theme->globals(function ($globals) {
	$globals->background = "dark";
	$globals->foreground = "white";
	$globals->caret = "pink";
	$globals->lineHighlight = "black";
	$globals->misspelling = "red";
	$globals->foldMarker = "pink";
	$globals->accent = "orange";
	$globals->gutterForeground = "grey";
	$globals->selection = "alphaRed";
	$globals->selectionBorder = "black";
	$globals->inactiveSelection = "alphaGrey";
	$globals->highlight = "pink";
	$globals->findHighlight = "pink";
	$globals->guide = "grey";
	$globals->selectionBorderWidth = 0;
	$globals->selectionCornerRadius = 0;
	$globals->selectionCornerStyle = SelectionCornerStyle::SQUARE;
	$globals->matchingBracketsStyle = MatchingBracketsStyle::BOLD | MatchingBracketsStyle::UNDERLINE;
});

section("General", function () use ($theme) {
	$theme->rule("Comments", function ($style) {
		$style->foreground = "grey";
		$style->fontStyle = FontStyle::ITALIC;
	});

	$theme->rule("Punctuation Symbols", function ($style) { $style->foreground = "light"; });
});

section("Diff", function () use ($theme) {
	$theme->rule("Diff: Deleted", function ($style) { $style->foreground = "red"; });
	$theme->rule("Diff: Inserted", function ($style) { $style->foreground = "green"; });
	$theme->rule("Diff: Changed", function ($style) { $style->foreground = "blue"; });
});

section("Markdown", function () use ($theme) {
	$theme->rule("Markup: Super Headings", function ($style) { $style->foreground = "red"; });
	$theme->rule("Markup: Sub Headings", function ($style) { $style->foreground = "orange"; });
	$theme->rule("Markup: Other Headings", function ($style) {
		$style->foreground = "yellow";
		$style->fontStyle = FontStyle::BOLD;
	});

	$theme->rule("Markup: Bolds", function ($style) {
		$style->foreground = "yellow";
		$style->fontStyle = FontStyle::BOLD;
	});

	$theme->rule("Markup: Italics", function ($style) {
		$style->foreground = "yellow";
		$style->fontStyle = FontStyle::ITALIC;
	});
	
	$theme->rule("Markup: Links", function ($style) {
		$style->foreground = "teal";
		$style->fontStyle = FontStyle::ITALIC;
	});
	
	$theme->rule("Markup: Quotations", function ($style) {
		$style->foreground = "green";
		$style->fontStyle = FontStyle::ITALIC;
	});

	$theme->rule("Markup: Code", function ($style) { $style->foreground = "green"; });
});

section("Programming", function () use ($theme) {
	$theme->rule("Constants", function ($style) { $style->foreground = "green"; });
	
	$theme->rule("Keywords", function ($style) {
		$style->foreground = "blue";
		$style->fontStyle = FontStyle::BOLD;
	});

	$theme->rule("Concrete Types", function ($style) { $style->foreground = "orange"; });
	
	$theme->rule("Abstract Types", function ($style) {
		$style->foreground = "orange";
		$style->fontStyle = FontStyle::ITALIC;
	});
	
	$theme->rule("Inherited Types", function ($style) {
		$style->foreground = "red";
		$style->fontStyle = FontStyle::ITALIC;
	});

	$theme->rule("Members", function ($style) { $style->foreground = "yellow"; });
	
	$theme->rule("Function Calls", function ($style) { $style->foreground = "teal"; });

	$theme->rule("Namespaces", function ($style) {
		$style->foreground = "purple";
		$style->fontStyle = FontStyle::BOLD;
	});

	$theme->rule("Invalids", function ($style) {
		$style->foreground = "red";
		$style->background = "black";
		$style->fontStyle = FontStyle::BOLD;
	});
});

section("Scopes Mapping", function () use ($theme) {
	$theme->map("Comments", [ "comment", "punctuation.definition.comment", "meta.toc-list" ]);
	$theme->map("Punctuation Symbols", [ "punctuation", "constant.character.escape", "constant.other.placeholder", "keyword.operator", "punctuation.definition.keyword", "markup.list.numbered.bullet" ]);
	$theme->map("Constants", [ "constant", "support.constant", "string" ]);
	$theme->map("Keywords", [ "keyword", "constant.language", "storage", "variable.language", "support.constant.prototype", "string.regexp punctuation.definition.group", "entity.other.pseudo-class", "entity.other.pseudo-element" ]);
	$theme->map("Concrete Types", [ "entity.name.class", "entity.name.function.constructor", "support.type", "support.class", "variable.type", "entity.name.tag", "string.regexp constant.other.character-class", "meta.function.return-type" ]);
	$theme->map("Abstract Types", [ "entity.name.interface" ]);
	$theme->map("Inherited Types", [ "entity.other.inherited-class" ]);
	$theme->map("Members", [ "entity.other.attribute-name", "variable.other.member", "meta.property", "meta.object-literal.key", "meta.object-literal.key string", "meta.structure.dictionary.key", "meta.structure.dictionary.key string", "support.type.property-name" ]);
	$theme->map("Function Calls", [ "variable.function", "support.function" ]);
	$theme->map("Namespaces", [ "entity.name.namespace", "support.module", "entity.other.attribute-name.namespace" ]);
	$theme->map("Invalids", [ "invalid" ]);

	$theme->map("Diff: Deleted", [ "markup.deleted" ]);
	$theme->map("Diff: Inserted", [ "markup.inserted" ]);
	$theme->map("Diff: Changed", [ "markup.changed" ]);

	$theme->map("Markup: Bolds", [ "markup.bold" ]);
	$theme->map("Markup: Italics", [ "markup.italic" ]);
	$theme->map("Markup: Links", [ "markup.underline.link" ]);
	$theme->map("Markup: Quotations", [ "markup.quote" ]);
	$theme->map("Markup: Super Headings", [ "markup.heading.1 punctuation.definition.heading" ]);
	$theme->map("Markup: Sub Headings", [ "markup.heading.2 punctuation.definition.heading" ]);
	$theme->map("Markup: Other Headings", [ "markup.heading punctuation.definition.heading" ]);
	$theme->map("Markup: Code", [ "markup.raw" ]);
});

$jsonTheme = build($theme);

echo $jsonTheme;
