<?php

namespace Odepax\MarsPeacock;

require_once("FeatureSupport.php");
require_once("ThemeConfiguration.php");

class ThemeBuilder
{
	private $themeBuilderCallback;

	function __construct(callable $builder)
	{
		$this->themeBuilderCallback = $builder;
	}

	function build(FeatureSupport $editorFeatures): ThemeConfiguration
	{
		$themeConfiguration = new ThemeConfiguration();

		call_user_func($this->themeBuilderCallback, $themeConfiguration, $editorFeatures);

		return $themeConfiguration;
	}
}
