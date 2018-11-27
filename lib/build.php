<?php

require_once "SelectionCornerStyle.php";

function buildRule($ruleName, $ruleStyle, $ruleScopes) {
	$output = [
		"name" => $ruleName,
		"scope" => $ruleScopes
	];

	if ($ruleStyle->foreground != null)
		$output["foreground"] = "var(" . $ruleStyle->foreground . ")";

	if ($ruleStyle->background != null)
		$output["background"] = "var(" . $ruleStyle->background . ")";

	if ($ruleStyle->selectionForeground != null)
		$output["selection_foreground"] = "var(" . $ruleStyle->selectionForeground . ")";

	if ($ruleStyle->fontStyle != null) {
		$fontStyles = [];

		if ($ruleStyle->fontStyle & FontStyle::BOLD) array_push($fontStyles, "bold");
		if ($ruleStyle->fontStyle & FontStyle::ITALIC) array_push($fontStyles, "italic");

		$output["font_style"] = implode(" ", $fontStyles);
	}

	return $output;
}

function buildRules($theme) {
	$rules = [];

	foreach ($theme->rules as $ruleName => $ruleStyle) {
		$ruleScopes = implode(", ", $theme->scopeMapings[$ruleName]);
		array_push($rules, buildRule($ruleName, $ruleStyle, $ruleScopes));
	}

	return $rules;
}

function buildGlobalSetting($key, $value) {
	switch ($key) {
		case "background":
		case "foreground":
		case "caret":
		case "lineHighlight":
		case "misspelling":
		case "foldMarker":
		case "minimapBorder":
		case "accent":
		case "gutter":
		case "gutterForeground":
		case "selection":
		case "selectionForeground":
		case "selectionBorder":
		case "inactiveSelection":
		case "inactiveSelectionForeground":
		case "highlight":
		case "findHighlight":
		case "findHighlightForeground":
		case "guide":
		case "activeGuide":
		case "stackGuide":
		case "shadow":
			return "var(" . $value . ")";

		case "shadowWidth":
		case "selectionBorderWidth":
		case "selectionCornerRadius":
			return $value;

		case "selectionCornerStyle": switch ($value) {
			case SelectionCornerStyle::SQUARE: return "square";
			case SelectionCornerStyle::CUT: return "cut";
			case SelectionCornerStyle::ROUND: return "round";
		}

		case "matchingBracketsStyle":
			$matchingBracketsStyle = [];

			if ($value & MatchingBracketsStyle::UNDERLINE)
				array_push($matchingBracketsStyle, "underline");

			if ($value & MatchingBracketsStyle::STIPPLED_UNDERLINE)
				array_push($matchingBracketsStyle, "stippled_underline");

			if ($value & MatchingBracketsStyle::SQUIGGLY_UNDERLINE)
				array_push($matchingBracketsStyle, "squiggly_underline");

			if ($value & MatchingBracketsStyle::BOLD)
				array_push($matchingBracketsStyle, "bold");

			if ($value & MatchingBracketsStyle::ITALIC)
				array_push($matchingBracketsStyle, "italic");

			return implode(" ", $matchingBracketsStyle);
	}
}

function buildGlobals($input) {
	$availableGlobalSettings = [
		"background" => "background",
		"foreground" => "foreground",
		"caret" => "caret",
		"lineHighlight" => "line_highlight",
		"misspelling" => "misspelling",
		"foldMarker" => "fold_marker",
		"minimapBorder" => "minimap_border",
		"accent" => "accent",
		"gutter" => "gutter",
		"gutterForeground" => "gutter_foreground",
		"selection" => "selection",
		"selectionForeground" => "selection_foreground",
		"selectionBorder" => "selection_border",
		"selectionBorderWidth" => "selection_border_width",
		"inactiveSelection" => "inactive_selection",
		"inactiveSelectionForeground" => "inactive_selection_foreground",
		"selectionCornerStyle" => "selection_corner_style",
		"selectionCornerRadius" => "selection_corner_radius",
		"highlight" => "highlight",
		"findHighlight" => "find_highlight",
		"findHighlightForeground" => "find_highlight_foreground",
		"guide" => "guide",
		"activeGuide" => "active_guide",
		"stackGuide" => "stack_guide",
		"shadow" => "shadow",
		"shadowWidth" => "shadow_width"
	];

	$output = [];

	foreach ($availableGlobalSettings as $setting => $settingKey)
		if ($input->$setting != null)
			$output[$settingKey] = buildGlobalSetting($setting, $input->$setting);

	if ($input->matchingBracketsStyle != null) {
		$output["brackets_options"] = buildGlobalSetting("matchingBracketsStyle", $input->matchingBracketsStyle);
		$output["bracket_contents_options"] = buildGlobalSetting("matchingBracketsStyle", $input->matchingBracketsStyle);
		$output["tags_options"] = buildGlobalSetting("matchingBracketsStyle", $input->matchingBracketsStyle);
	}

	return $output;
}

function build($theme) {
	$themeObject = [
		"name" => $theme->name,
		"variables" => array_map(function ($color) { return $color->toHexa(); }, $theme->colors),
		"globals" => buildGlobals($theme->globalRules),
		"rules" => buildRules($theme)
	];

	return json_encode($themeObject, JSON_PRETTY_PRINT);
}
