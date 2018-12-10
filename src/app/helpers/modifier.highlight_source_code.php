<?php
require_once(__DIR__ . "/block.highlight_source_code.php");

/**
 * Source code syntax highlighter
 *
 * Usage:
 *
 *	{$html_snippet|highlight_source_code|nofilter}
 *	{$html_snippet|highlight_source_code:"html"|nofilter}
 *
 * In an ATK14 application you can use exclamation mark mark instead of nofilter directive:
 *	
 *	{!$html_snippet|highlight_source_code:"html"}
 *
 * You need to have GesHi installed
 *
 *	$ composer install easybook/geshi
 */
function smarty_modifier_highlight_source_code($content,$lang = "auto"){
	$repeat = false;
	return smarty_block_highlight_source_code(array("lang" => $lang),$content,null,$repeat);
}
