<?php

/**
 * Default formatter class for forms
 */
class sfWidgetFormSchemaFormatterTwitterBootstrap extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat       = "<li><div class= \"clearfix\">\n  %error%%label%\n  <div class=\"input\">%field%%help%\n%hidden_fields%</div></div></li>\n",
    $errorRowFormat  = "<li>\n%errors%</li>\n",
    $helpFormat      = '<br />%help%',
    $decoratorFormat = "<ul class=\"man\">\n  %content%</ul>";
}