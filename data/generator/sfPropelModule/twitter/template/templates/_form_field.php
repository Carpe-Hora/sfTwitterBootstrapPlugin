[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <div class="clearfix [?php echo $class ?][?php $form[$name]->hasError() and print ' error' ?]">

    <div>
      [?php echo $form[$name]->renderLabel($label) ?]

      <div class="input">
        [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]
        [?php echo $form[$name]->renderError() ?]

        [?php if ($help): ?]
          <span class="help-block">[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</span>
        [?php elseif ($help = $form[$name]->renderHelp()): ?]
          <span class="help-block">[?php echo $help ?]</span>
        [?php endif; ?]
      </div>
    </div>
  </div>
[?php endif; ?]
