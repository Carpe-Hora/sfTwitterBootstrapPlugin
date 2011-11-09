[?php $filterFields = sfOutputEscaper::unescape($configuration->getFormFilterFields($filters)) ?]
<form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
<tr class="greystock">
    <?php if ($this->configuration->getValue('list.batch_actions')): ?>
    <td></td>
    <?php endif; ?>
    <?php foreach ($this->configuration->getValue('list.display') as $name => $field): ?>
    <td>
        [?php if(isset($filters['<?php echo $name ?>'])/* && $filterFields['<?php echo $name ?>']->isReal() && !$filters['<?php echo $name ?>']->isHidden()*/): ?]
            [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
                'name'       => '<?php echo $name ?>',
                'attributes' => $filterFields['<?php echo $name ?>']->getConfig('attributes', array('class' => 'xlarge')),
                'label'      => $filterFields['<?php echo $name ?>']->getConfig('label'),
                'help'       => $filterFields['<?php echo $name ?>']->getConfig('help'),
                'form'       => $filters,
                'field'      => $filterFields['<?php echo $name ?>'],
                'class'      => 'xlarge sf_admin_'.strtolower($filterFields['<?php echo $name ?>']->getType()).' sf_admin_filter_field_<?php echo $name ?>',
              )) ?]
       [?php endif; ?]
    </td>
    <?php endforeach; ?>
    <td>
        [?php echo $filters->renderHiddenFields() ?]
        [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?]
        <input type="submit" class="btn" value="[?php echo __('Search', array(), 'sf_admin') ?]" />
    </td>
</tr>
</form>