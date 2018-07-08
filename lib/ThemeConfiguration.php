<?php

namespace Odepax\MarsPeacock;

require_once("ProgrammingSet.php");
require_once("EditorSet.php");
require_once("MarkupSet.php");

class ThemeConfiguration
{
	public $name = "";
	public $version = "";

	public $author = "";
	public $email = "";
	public $url = "";

	public $editor;
	public $default;
	
	public $c;
	public $rust;
	public $xml;
	public $css;
	public $javaScript;
	public $typeScript;
	public $coffeeScript;
	public $php;
	public $python;
	public $perl;
	public $ruby;
	public $cSharp;
	public $fSharp;
	public $visualBasic;
	public $powerShell;
	public $java;
	public $kotlin;
	public $clojure;
	public $scala;
	public $groovy;

	public $markdown;
	public $tex;

	function __construct()
	{
		$this->editor = new EditorSet();
		$this->default = new ProgrammingSet();
		$this->markdown = new MarkupSet();
	}
}
