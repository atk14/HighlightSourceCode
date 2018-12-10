HighlightSourceCode
===================

Helper for source code highlighting in templates.

It is using GeSHi and basically it consists of a block function and a modifier for Smarty templating engine.

Usage in a ATK14 template
-------------------------

    {!$html_snippet|highlight_source_code}
    {!$php_snippet|highlight_source_code:"php"}
    {!$template_snippet|highlight_source_code:"smarty"}

There is also a block helper which provides some more options

    {highlight_source_code}
      <h1>Title</h1>
    {/highlight_source_code}

    {highlight_source_code lang="html" overal_class="code code--html" overal_id="id_content"}
      <h1>Title</h1>
    {/highlight_source_code}

Installation
------------

Just use the Composer:

    cd path/to/your/atk14/project/
    composer require atk14/highlight-source-code dev-master

Optionaly you can link (or copy & edit) helpers to your project.

    ln -s ../../vendor/atk14/highlight-source-code/src/app/helpers/block.highlight_source_code.php app/helpers/
    ln -s ../../vendor/atk14/highlight-source-code/src/app/helpers/modifier.highlight_source_code.php app/helpers/

License
-------

HighlightSourceCode is free software distributed [under the terms of the MIT license](http://www.opensource.org/licenses/mit-license)
