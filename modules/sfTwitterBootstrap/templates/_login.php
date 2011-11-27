<?php use_helper('I18N'); ?>

<div class="mod login">
  <div class="inner">
    <div class="hd center"></div>
    <div class="bd">
      <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        <?php echo $form->renderHiddenFields(); ?>
        <fieldset class="loginFieldset">
          <legend><?php echo sfTwitterBootstrap::getProperty('site'); ?></legend>
          <div class="clearfix <?php echo $form['username']->hasError() ? 'error': '' ?>">
            <?php echo $form['username']->renderRow() ?>
          </div>
          <div class="clearfix <?php echo $form['password']->hasError() ? 'error': '' ?>">
            <?php echo $form['password']->renderRow() ?>
          </div>

          <div class="actions">
            <input type="submit" class="btn primary" value="<?php echo __('sign in') ?>" />
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
