[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

  <h2 class="mbl">[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h2>

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
  </div>

  <div class="table mtm">

<?php if (0 != count($this->configuration->getValue('list.actions')) || 0 != count($this->configuration->getValue('list.batch_actions'))): ?>
    <div class="actions pam mtn">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
    </div>
<?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list', array(<?php if ($this->configuration->hasFilterForm()): ?>'filters' => $filters, 'configuration' => $configuration,<?php endif; ?> 'pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
  </div>

  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>
