<?php
use_helper('I18N');

/** @var Array of menu items */ $items = $sf_data->getRaw('items');
/** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
/** @var string|null Link to the module (for breadcrumbs) */ $module_link = $sf_data->getRaw('module_link');
/** @var string|null Link to the action (for breadcrumbs) */ $action_link = $sf_data->getRaw('action_link');

?>
<div class="topbar">
   <div class="topbar-inner">
      <div class="container-fluid">
        <a class="brand" href="<?php echo url_for('@homepage') ?>"><?php echo sfTwitterBootstrap::getProperty('site'); ?></a>

<?php if ($sf_user->isAuthenticated()): ?>
        <?php include_partial('sfTwitterBootstrap/menu', array('items' => $items, 'categories' => $categories)); ?>
        <p class="logged pull-right primary-color">Logged in as <a href="#"><?php echo $sf_user->__toString(); ?></a></p>
<?php endif; // if user is authenticated ?>
        </div>
    </div>
</div>