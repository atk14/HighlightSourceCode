<?php
/**
 * Source code syntax highlighter
 *
 * Usage:
 *
 *	{highlight_source_code lang="html"}
 *		<h1>Hello world!</h1>
 *	{/highlight_source_code}
 *
 * You need to have GesHi installed
 *
 *	$ composer install easybook/geshi
 *
 */
function smarty_block_highlight_source_code($params,$content,$template,&$repeat){
	if($repeat){ return; }

	$params += array(
		"lang" => "auto",
		"normalize_content" => true,
	);

	if($params["normalize_content"]){
		// Replaces all tabulators at the beginning of each line with two spaces.
		// Cuts off common amount of spaces on each line.
		$got_content = false;
		$min_spaces_at_the_begining = 9999;
		$lines = [];
		foreach(explode("\n",$content) as $line){
			if(!$got_content && trim($line)==""){ continue; }
			$got_content = true;
			while(preg_match('/^ *\t/',$line)){
				$line = preg_replace('/^( *)\t/','\1  ',$line);
			}
			preg_match('/^( *)/',$line,$spaces);
			if(strlen($spaces[1])<$min_spaces_at_the_begining && trim($line)!=""){
				$min_spaces_at_the_begining = strlen($spaces[1]);
			}
			$lines[] = $line;
		}

		foreach($lines as $key => $line){
			$lines[$key] = substr($line,$min_spaces_at_the_begining);
		}
		$content = join("\n",$lines);
		$content = rtrim($content);
	}

	$lang = $params["lang"];

	if($lang == "auto"){
		// TODO: autodetection
		$lang = "html";
	}

	$tr = array(
		"html5" => array("html"),
		"javascript" => array("js"),
	);

	foreach($tr as $key => $ar){
		if(in_array($lang,$ar)){ $lang = $key; break; }
	}

	$geshi = new GeSHi($content,$lang);
	$geshi->enable_keyword_links(false);
	$geshi->set_overall_style("");
	$geshi->enable_classes(false);
	return $geshi->parse_code();
}
