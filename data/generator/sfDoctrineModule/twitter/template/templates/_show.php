[?php include_stylesheets_for_form($form) ?]
[?php include_javascripts_for_form($form) ?]

<div class="sf_admin_show">
[?php foreach ($configuration->getFormFields($form, 'show') as $fieldset => $fields): ?]

  [?php if (true == sfTwitterBootstrap::getProperty('top_link_to_fieldset') && 'NONE' != $fieldset): ?]
    <a name="[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]"></a>
  [?php endif; ?]

  <fieldset id="sf_fieldset_[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]">
    [?php if ('NONE' != $fieldset): ?]
      <legend>[?php echo __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</legend>
    [?php endif; ?]

    [?php include_partial('<?php echo $this->getModuleName() ?>/show_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]

  </fieldset>
[?php endforeach; ?]
</div>
