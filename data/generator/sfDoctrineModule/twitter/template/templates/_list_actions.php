<?php if ($actions = $this->configuration->getValue('list.actions')): ?>
  <div class="fRight">
  <?php foreach ($actions as $name => $params): ?>
    <?php if ('_new' == $name): ?>
      <?php echo $this->addCredentialCondition('[?php echo $helper->linkToNew('.$this->asPhp($params).') ?]', $params)."\n" ?>
    <?php else: ?>

      <?php
        $params['params'] = is_array($params['params']) ? array_merge($params['params'], array('class' => 'btn')) : array('class' => 'btn') ;
        echo $this->addCredentialCondition($this->getLinkToAction($name, $params, false), $params)."\n"
      ?>

    <?php endif; ?>
  <?php endforeach; ?>
  </div>
<?php endif; ?>
