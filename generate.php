<?php

namespace Odepax\MarsPeacock\Program;

require_once("lib/ThemeBuilder.php");
require_once("lib/ThemeConfiguration.php");
require_once("lib/Feature.php");
require_once("lib/FeatureSupport.php");
require_once("lib/ProgrammingSet.php");
require_once("lib/SublimeText/SublimeTextFeatureSupport.php");
require_once("lib/SublimeText/SublimeTextThemeGenerator.php");
require_once("lib/Color.php");
require_once("lib/Underline.php");

use \Odepax\MarsPeacock\ThemeBuilder;
use \Odepax\MarsPeacock\ThemeConfiguration;
use \Odepax\MarsPeacock\Feature;
use \Odepax\MarsPeacock\FeatureSupport;
use \Odepax\MarsPeacock\ProgrammingSet;
use \Odepax\MarsPeacock\SublimeText\SublimeTextFeatureSupport;
use \Odepax\MarsPeacock\SublimeText\SublimeTextThemeGenerator;
use \Mexitek\PHPColors\Color;
use \Odepax\MarsPeacock\Underline;

function applyLanguageSpecificColorMerging(ProgrammingSet $baseSettings, Color $color): ProgrammingSet
{
	$newSettings = new ProgrammingSet();

	if ($baseSettings->overall->color != null) $newSettings->overall->color = Color::mix($baseSettings->overall->color, $color);
	if ($baseSettings->keyword->color != null) $newSettings->keyword->color = Color::mix($baseSettings->keyword->color, $color);
	if ($baseSettings->operator->color != null) $newSettings->operator->color = Color::mix($baseSettings->operator->color, $color);
	if ($baseSettings->type->color != null) $newSettings->type->color = Color::mix($baseSettings->type->color, $color);
	if ($baseSettings->namespace->color != null) $newSettings->namespace->color = Color::mix($baseSettings->namespace->color, $color);
	if ($baseSettings->concrete->color != null) $newSettings->concrete->color = Color::mix($baseSettings->concrete->color, $color);
	if ($baseSettings->abstract->color != null) $newSettings->abstract->color = Color::mix($baseSettings->abstract->color, $color);
	if ($baseSettings->metadata->color != null) $newSettings->metadata->color = Color::mix($baseSettings->metadata->color, $color);
	if ($baseSettings->comment->color != null) $newSettings->comment->color = Color::mix($baseSettings->comment->color, $color);
	if ($baseSettings->documentation->color != null) $newSettings->documentation->color = Color::mix($baseSettings->documentation->color, $color);
	if ($baseSettings->constant->color != null) $newSettings->constant->color = Color::mix($baseSettings->constant->color, $color);
	if ($baseSettings->numeric->color != null) $newSettings->numeric->color = Color::mix($baseSettings->numeric->color, $color);
	if ($baseSettings->boolean->color != null) $newSettings->boolean->color = Color::mix($baseSettings->boolean->color, $color);
	if ($baseSettings->text->color != null) $newSettings->text->color = Color::mix($baseSettings->text->color, $color);
	if ($baseSettings->magic->color != null) $newSettings->magic->color = Color::mix($baseSettings->magic->color, $color);
	if ($baseSettings->punctuation->color != null) $newSettings->punctuation->color = Color::mix($baseSettings->punctuation->color, $color);
	if ($baseSettings->symbol->color != null) $newSettings->symbol->color = Color::mix($baseSettings->symbol->color, $color);

	return $newSettings;
}

$cameleonPeacock = new ThemeBuilder(function (ThemeConfiguration $settings, FeatureSupport $platform)
{
	$black = Color::hexa("#111");
	$grey = Color::hexa("#aaa");
	$white = Color::hexa("#fff");
	$yellow = Color::hexa("#ffa");
	$orange = Color::hexa("#fa0");
	$purple = Color::hexa("#a0f");
	$blue = Color::hexa("#aaf");
	$green = Color::hexa("#afa");
	$pink = Color::hexa("#faf");

	$settings->name = "Cameleon Peacock";

	$settings->default->overall->color = $white;
	$settings->default->overall->background = $black;
	$settings->default->comment->color = $grey;
	$settings->default->punctuation->color = $grey;
	$settings->default->keyword->color = $yellow;
	$settings->default->type->color = $blue;
	$settings->default->constant->color = $green;
	$settings->default->symbol->color = $pink;

	if ($platform->supports(Feature::LANGUAGE_SPECIFIC_SCOPES)) {
		$settings->xml = applyLanguageSpecificColorMerging($settings->default, $orange);
		$settings->php = applyLanguageSpecificColorMerging($settings->default, $purple);
	}
});

(new SublimeTextThemeGenerator())->generate($cameleonPeacock->build(new SublimeTextFeatureSupport()));
