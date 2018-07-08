<?php

namespace Odepax\MarsPeacock;

class CodeHighlightScope
{
	/** @var \Mexitek\PHPColors\Color */ public $color;
	/** @var \Mexitek\PHPColors\Color */ public $background;
	/** @var \Mexitek\PHPColors\Color */ public $border;
	/** @var int @see \Odepax\MarsPeacock\Underline */ public $underline;
	/** @var bool */ public $bold;
	/** @var bool */ public $italic;
	/** @var string */ public $font;
}
