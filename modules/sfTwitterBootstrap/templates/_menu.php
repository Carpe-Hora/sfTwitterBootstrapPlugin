<?php
use_helper('I18N');
/** @var Array of menu items */ $items = $sf_data->getRaw('items');
/** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
?>

<?php if (count($items)): ?>
  <ul class="nav">
    <?php if (sfTwitterBootstrap::hasItemsMenu($items)): ?>
      <li class="dropdown" data-dropdown="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Menu
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $items, 'items_in_menu' => true)); ?>
        </ul>
      </li>
    <?php endif; ?>
    <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $items, 'items_in_menu' => false)); ?>
  </ul>
<?php endif; ?>

<?php if (count($categories)): ?>
  <ul class="nav">

    <?php foreach ($categories as $name => $category): ?>
      <?php if (sfTwitterBootstrap::hasPermission($category, $sf_user)): ?>
        <li class="dropdown">

          <?php if (isset($category['url'])): ?>

            <?php $class = ''; ?>
            <?php if (isset($category['items'])): ?>
              <?php if (sfTwitterBootstrap::hasItemsMenu($category['items'])): ?>
                <?php $class = 'dropdown-toggle'; ?>
              <?php endif; ?>
            <?php endif; ?>

            <a data-toggle="dropdown" href="<?php echo url_for($category['url']); ?>" class="<?php echo $class; ?>">
              <?php echo __(isset($category['name']) ? $category['name'] : $name) ?>
              <b class="caret"></b>
            </a>

          <?php else: ?>
            <a data-toggle="dropdown" href="#" class="dropdown-toggle" >
              <?php echo __(isset($category['name']) ? $category['name'] : $name) ?>
              <b class="caret"></b>
            </a>
          <?php endif; ?>

          <?php if (isset($category['items']) && sfTwitterBootstrap::hasItemsMenu($category['items'])): ?>
            <ul class="dropdown-menu">
              <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $category['items'], 'items_in_menu' => true)) ?>
            </ul>
          <?php endif; ?>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($categories as $name => $category): ?>
      <?php if (isset($category['items'])): ?>
        <?php include_partial('sfTwitterBootstrap/menu_list', array('items' => $category['items'], 'items_in_menu' => false)) ?>
      <?php endif; ?>
    <?php endforeach; ?>

  </ul>
<?php elseif (!count($items)): ?>
  <?php echo __('sfTwitterBootstrap is not configured.'); ?>
<?php endif; ?>