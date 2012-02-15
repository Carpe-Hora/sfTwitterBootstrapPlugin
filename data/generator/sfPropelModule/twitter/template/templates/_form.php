[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="sf_admin_form">
  [?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>') ?]

<?php if($this->configuration->hasNewPartial()) : ?>
  [?php if ($form->isNew()) : ?]
  <div class="sf_admin_right_column">
  <?php foreach($this->configuration->getNewPartial() as $partial): ?>
    [?php include_partial('<?php echo $partial ?>', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper, 'configuration' => $configuration)) ?]
  <?php endforeach; ?>
  </div>
  <div class="sf_admin_with_right_colum">
  [?php endif; ?]
<?php endif; ?>

<?php if($this->configuration->hasEditPartial()) : ?>
  [?php if (!$form->isNew()) : ?]
  <div class="sf_admin_right_column">
  <?php foreach($this->configuration->getEditPartial() as $partial): ?>
    [?php include_partial('<?php echo $partial ?>', array('form' => $form, '<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'helper' => $helper, 'configuration' => $configuration)) ?]
  <?php endforeach; ?>
  </div>
  <div class="sf_admin_with_right_colum">
  [?php endif; ?]
<?php endif; ?>

    [?php echo $form->renderHiddenFields(false) ?]

    [?php if ($form->hasGlobalErrors()): ?]
      [?php echo $form->renderGlobalErrors() ?]
    [?php endif; ?]

    [?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
<?php if ($this->extendFieldsetTemplate()): ?>
      [?php switch ($fieldset):
<?php if ($this->hasBehavior('lk_faceable')): ?>
        case 'Faces': ?]
          [?php foreach ($form->getFaceScopes() as $scope): ?]
            [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset_faces', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form[$scope], 'fields' => $fields, 'fieldset' => $fieldset)) ?]
            [?php endforeach; ?]
          [?php break;
<?php endif ?>
        default: ?]
<?php endif ?>
        [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]
<?php if ($this->extendFieldsetTemplate()): ?>
      [?php endswitch; ?]
<?php endif ?>
    [?php endforeach; ?]


<?php if($this->configuration->hasEditPartial() && $this->configuration->hasNewPartial()) : ?>
  </div>
<?php elseif ($this->configuration->hasNewPartial()) : ?>
  [?php if ($form->isNew()) : ?]
  </div>
  [?php endif; ?]
<?php else : ?>
  [?php if (!$form->isNew()) : ?]
  </div>
  [?php endif; ?]
<?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]

  </form>
</div>
