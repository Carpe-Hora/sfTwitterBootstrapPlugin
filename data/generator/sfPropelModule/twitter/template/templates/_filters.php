[?php $filterFields = sfOutputEscaper::unescape($configuration->getFormFilterFields($filters)) ?]
<form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
  <tr class="greystock">
    <?php if ($this->configuration->getValue('list.batch_actions')): ?>
    <td></td>
    <?php endif; ?>
    <?php foreach ($this->configuration->getValue('list.display') as $name => $field): ?>
    <td>
      [?php if(isset($filters['<?php echo $name ?>']) && isset($filterFields['<?php echo $name ?>'])/* && $filterFields['<?php echo $name ?>']->isReal() && !$filters['<?php echo $name ?>']->isHidden()*/): ?]
        [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
          'name'       => '<?php echo $name ?>',
          'attributes' => $filterFields['<?php echo $name ?>']->getConfig(
            'attributes',
            array('class' => sfTwitterBootstrap::guessLengthFromType($filterFields['<?php echo $name ?>']->getType()))
          ),
          'label'      => $filterFields['<?php echo $name ?>']->getConfig('label'),
          'help'       => $filterFields['<?php echo $name ?>']->getConfig('help'),
          'form'       => $filters,
          'field'      => $filterFields['<?php echo $name ?>'],
        )) ?]
     [?php endif; ?]
    </td>
    <?php endforeach; ?>
    <td>
        [?php echo $filters->renderHiddenFields() ?]
        <input type="submit" class="btn info" value="[?php echo __('Filter', array(), 'sf_admin') ?]" />
        [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('class' => 'btn', 'query_string' => '_reset', 'method' => 'post')) ?]
    </td>
  </tr>
</form>