<?php
class TcHighlightSourceCode extends TcBase {

	function test(){
		$this->assertEquals('<pre class="html5">Test</pre>',smarty_modifier_highlight_source_code('Test'));	
		$this->assertEquals('<pre class="html5"><span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">h1</span>&gt;</span>Test<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">h1</span>&gt;</span></pre>',smarty_modifier_highlight_source_code('<h1>Test</h1>'));	
		$this->assertEquals('<pre class="html5"><span style="color: #009900;">&lt;<span style="color: #000000; font-weight: bold;">h1</span>&gt;</span>Test<span style="color: #009900;">&lt;<span style="color: #66cc66;">/</span><span style="color: #000000; font-weight: bold;">h1</span>&gt;</span></pre>',smarty_modifier_highlight_source_code('<h1>Test</h1>','html'));	
		$this->assertEquals('<pre class="smarty"><span style="color: #009000;">&lt;h1&gt;</span>Test<span style="color: #009000;">&lt;/h1&gt;</span></pre>',smarty_modifier_highlight_source_code('<h1>Test</h1>','smarty'));

		$repeat = false;

		$params = array('overal_style' => 'font-family:monospace;');
		$this->assertEquals('<pre class="html5" style="font-family:monospace;">Test</pre>',smarty_block_highlight_source_code($params,'Test',null,$repeat));

		$params = array('overal_class' => 'code');
		$this->assertEquals('<pre class="html5 code">Test</pre>',smarty_block_highlight_source_code($params,'Test',null,$repeat));

		$params = array('overal_class' => 'code', 'overal_id' => 'id_code');
		$this->assertEquals('<pre class="html5 code" id="id_code">Test</pre>',smarty_block_highlight_source_code($params,'Test',null,$repeat));

		$params = array('overal_class' => 'code', 'overal_id' => 'id_code', 'enable_classes' => '1');
		$this->assertEquals('<pre class="html5 code" id="id_code"><span class="sc2">&lt;<span class="kw2">i</span>&gt;</span>Test<span class="sc2">&lt;<span class="sy0">/</span><span class="kw2">i</span>&gt;</span></pre>',smarty_block_highlight_source_code($params,'<i>Test</i>',null,$repeat));
	}
}
