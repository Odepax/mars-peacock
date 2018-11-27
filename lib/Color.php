<?php

/**
 * @author mexitek
 * @see https://packagist.org/packages/mexitek/phpcolors
 * @license MIT
 * 
 * @property bool $isLight
 * @property bool $isDark
 */
class Color
{
	/**
	 * @param int $red Between 0 and 255.
	 * @param int $green Between 0 and 255.
	 * @param int $blue Between 0 and 255.
	 * @param int $aplha Between 0 and 255. Defaults to 255.
	 */
	static function rgba(int $red, int $green, int $blue, int $alpha = 255): Color
	{
		return new Color($red, $green, $blue, $alpha);
	}

	/**
	 * @param string $hex
	 * Can be 3 or 6 (4 or 8 if alpha is specified) hexadecimal digits-long.
	 * Aplha defaults to 'FF'.
	 * Leading '#' will be stripped.
	 */
	static function hexa(string $hex): Color
	{
		$hex = str_replace("#", "", $hex);

		switch (strlen($hex)) {
			case 3: $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2] . "FF"; break;
			case 4: $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2] . $hex[3] . $hex[3]; break;
			case 6: $hex .= "FF"; break;
		}

		return new Color(
			hexdec($hex[0] . $hex[1]),
			hexdec($hex[2] . $hex[3]),
			hexdec($hex[4] . $hex[5]),
			hexdec($hex[6] . $hex[7])
		);
	}

	/**
	 * @param float $amount Between -1.0 (full original) and 1.0 (full added). Defaults to 0;
	 */
	static function mix(Color $original, Color $added, float $balance = 0): Color
	{
		$originalRatio = 1.0 + $balance;
		$addedRatio = 1.0 - $balance;

		return new Color(
			($original->red * $originalRatio + $added->red * $addedRatio) / 2,
			($original->green * $originalRatio + $added->green * $addedRatio) / 2,
			($original->blue * $originalRatio + $added->blue * $addedRatio) / 2,
			($original->alpha * $originalRatio + $added->alpha * $addedRatio) / 2
		);
	}

	private $red = 0;
	private $green = 0;
	private $blue = 0;
	private $alpha = 1;

	private function __construct($red, $green, $blue, $alpha)
	{
		$this->red = $red;
		$this->green = $green;
		$this->blue = $blue;
		$this->alpha = $alpha;
	}

	function __get($propertyName)
	{
		switch ($propertyName) {
			case "isDark": return $this->red * 299 + $this->green * 587 + $this->blue * 114 / 1000 < 127;
			case "isLight": return 128 < $this->red * 299 + $this->green * 587 + $this->blue * 114 / 1000;

			default: return null;
		}
	}

	/**
	 * @return string With leading '#'.
	 */
	function toHexa(): string
	{
		return '#'
			. str_pad(dechex($this->red), 2, '0', STR_PAD_LEFT)
			. str_pad(dechex($this->green), 2, '0', STR_PAD_LEFT)
			. str_pad(dechex($this->blue), 2, '0', STR_PAD_LEFT)
			. str_pad(dechex($this->alpha), 2, '0', STR_PAD_LEFT);
	}

	/**
	 * @return string With leading '#'.
	 */
	function toHex(): string
	{
		return '#'
			. str_pad(dechex($this->red), 2, '0', STR_PAD_LEFT)
			. str_pad(dechex($this->green), 2, '0', STR_PAD_LEFT)
			. str_pad(dechex($this->blue), 2, '0', STR_PAD_LEFT);
	}
}
