<?php

namespace Odepax\MarsPeacock;

require_once("CodeHighlightScope.php");

class ProgrammingSet
{
	/** @var CodeHighlightScope */ public $overall;
	/** @var CodeHighlightScope */ public $keyword;
	/** @var CodeHighlightScope */ public $operator;
	/** @var CodeHighlightScope */ public $type;
	/** @var CodeHighlightScope */ public $namespace;
	/** @var CodeHighlightScope */ public $concrete;
	/** @var CodeHighlightScope */ public $abstract;
	/** @var CodeHighlightScope */ public $metadata;
	/** @var CodeHighlightScope */ public $comment;
	/** @var CodeHighlightScope */ public $documentation;
	/** @var CodeHighlightScope */ public $constant;
	/** @var CodeHighlightScope */ public $numeric;
	/** @var CodeHighlightScope */ public $boolean;
	/** @var CodeHighlightScope */ public $text;
	/** @var CodeHighlightScope */ public $magic;
	/** @var CodeHighlightScope */ public $punctuation;
	/** @var CodeHighlightScope */ public $symbol;

	function __construct()
	{
		$this->overall = new CodeHighlightScope();
		$this->keyword = new CodeHighlightScope();
		$this->operator = new CodeHighlightScope();
		$this->type = new CodeHighlightScope();
		$this->namespace = new CodeHighlightScope();
		$this->concrete = new CodeHighlightScope();
		$this->abstract = new CodeHighlightScope();
		$this->metadata = new CodeHighlightScope();
		$this->comment = new CodeHighlightScope();
		$this->documentation = new CodeHighlightScope();
		$this->constant = new CodeHighlightScope();
		$this->numeric = new CodeHighlightScope();
		$this->boolean = new CodeHighlightScope();
		$this->text = new CodeHighlightScope();
		$this->magic = new CodeHighlightScope();
		$this->punctuation = new CodeHighlightScope();
		$this->symbol = new CodeHighlightScope();
	}
}
