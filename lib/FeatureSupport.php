<?php

namespace Odepax\MarsPeacock;

require_once("Feature.php");

interface FeatureSupport
{
	/**
	 * @param int $feature @see \Odepax\MarsPeacock\Feature
	 */
	function supports(int $feature): bool;

	/**
	 * @param int... $features @see \Odepax\MarsPeacock\Feature
	 * @return int @see \Odepax\MarsPeacock\Feature
	 */
	function firstSupported(int ... $feature): int;
}
