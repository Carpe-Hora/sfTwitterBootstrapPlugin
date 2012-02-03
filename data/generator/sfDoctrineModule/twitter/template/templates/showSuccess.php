[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container">
  <?php if($this->configuration->hasShowPartial()) : ?>
    <div class="sf_admin_right_column">
    <?php foreach($this->configuration->getShowPartial() as $partial): ?>
      [?php include_partial('<?php echo $partial ?>', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper, 'configuration' => $configuration)) ?]
    <?php endforeach; ?>
    </div>
    <div class="sf_admin_with_right_colum">
  <?php endif; ?>

  <h2 class="mbl">
    [?php echo <?php echo $this->getI18NString('show.title') ?> ?]

    [?php if(true == sfTwitterBootstrap::getProperty('top_link_to_fieldset')): ?]
      [?php foreach ($configuration->getFormFields($form, 'edit') as $fieldset => $fields): ?]
        [?php if ('NONE' != $fieldset): ?]
          [?php $fieldset_name = __($fieldset, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]
            <small>- <a class="link-to-fieldset" href="#[?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?]">[?php echo $fieldset_name ?]</a></small>
        [?php endif; ?]
      [?php endforeach; ?]
    [?php endif; ?]
  </h2>

  <div id="sf_admin_content">
    [?php include_partial('show', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'configuration' => $configuration)) ?]
  </div>

  [?php include_partial('show_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'configuration' => $configuration, 'helper' => $helper)) ?]

<?php if($this->configuration->hasShowPartial()) : ?>
  </div>
<?php endif; ?>
</div>
