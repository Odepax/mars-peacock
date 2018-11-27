<?php

require_once "RuleStyle.php";
require_once "GlobalStyle.php";

class Theme {
	public $name = "";
	public $colors = [];
	public $globalRules = [];
	public $rules = [];
	public $scopeMapings = [];

	public function rule($ruleName, $ruleConfiguration) {
		$ruleStyle = new RuleStyle();
		$ruleConfiguration($ruleStyle);
		$this->rules[$ruleName] = $ruleStyle;
	}

	public function globals($ruleConfiguration) {
		$ruleStyle = new GlobalStyle();
		$ruleConfiguration($ruleStyle);
		$this->globalRules = $ruleStyle;
	}

	public function map($ruleName, $scopes) {
		if (!array_key_exists($ruleName, $this->scopeMapings))
			$this->scopeMapings[$ruleName] = [];

		$this->scopeMapings[$ruleName] = array_unique(array_merge($this->scopeMapings[$ruleName], $scopes));
	}
}
