<?php
class TcHighlightSourceCode extends TcBase {

	function test(){
		$this->assertEquals('<pre class="html5">Test</pre>',smarty_modifier_highlight_source_code('Test'));	
		$this->assertEquals('<pre class="html5"><span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">h1</span>&gt;</span>Test<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">h1</span>&gt;</span></pre>',smarty_modifier_highlight_source_code('<h1>Test</h1>'));	
		$this->assertEquals('<pre class="html5"><span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">h1</span>&gt;</span>Test<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">h1</span>&gt;</span></pre>',smarty_modifier_highlight_source_code('<h1>Test</h1>','html'));	
		$this->assertEquals('<pre class="smarty"><span style="color: #009000;">&lt;h1&gt;</span>Test<span style="color: #009000;">&lt;/h1&gt;</span></pre>',smarty_modifier_highlight_source_code('<h1>Test</h1>','smarty'));
	}
}
