<?php

require_once "SelectionCornerStyle.php";
require_once "MatchingBracketsStyle.php";

class GlobalStyle {
	// Colors.
	public $background = null;
	public $foreground = null;
	public $caret = null;
	public $lineHighlight = null;
	public $misspelling = null;
	public $foldMarker = null;
	public $minimapBorder = null;
	public $accent = null;
	public $gutter = null;
	public $gutterForeground = null;
	public $selection = null;
	public $selectionForeground = null;
	public $selectionBorder = null;
	public $inactiveSelection = null;
	public $inactiveSelectionForeground = null;
	public $highlight = null;
	public $findHighlight = null;
	public $findHighlightForeground = null;
	public $guide = null;
	public $activeGuide = null;
	public $stackGuide = null;
	public $shadow = null;

	// Numeric values.
	public $shadowWidth = null;
	public $selectionBorderWidth = null; // From 0 to 4.
	public $selectionCornerRadius = null;

	// Enum options.
	public $selectionCornerStyle = null;
	public $matchingBracketsStyle = null;
}
