<?php

namespace Odepax\MarsPeacock\SublimeText;

require_once("lib/Feature.php");
require_once("lib/FeatureSupport.php");

use \Odepax\MarsPeacock\Feature;
use \Odepax\MarsPeacock\FeatureSupport;

class SublimeTextFeatureSupport implements FeatureSupport
{
	function supports(int $feature): bool
	{
		return $feature == Feature::LANGUAGE_SPECIFIC_SCOPES;
	}

	function firstSupported(int ... $feature): int
	{
		return Feature::NONE;
	}
}
