<?php

namespace Odepax\MarsPeacock;

require_once("ThemeConfiguration.php");

interface ThemeGenerator
{
	function generate(ThemeConfiguration $themeConfiguration);
}
