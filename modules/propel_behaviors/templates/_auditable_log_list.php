<?php use_helper('I18N') ?>
<?php $object = $form->getObject(); ?>
<?php $is_first = true; ?>
<?php $label = null; ?>
<?php $totalcount = 5 ?>

<section id="audit-trail">
  <h3><?php echo __('Audit trail') ?></h3>
  <ul class="audit-trail">
    <?php foreach($object->getLastActivity($totalcount, $label) as $activity): ?>
      <li class="item-record activity-record<?php echo !$is_first ? ' other' : ' first' ?>">
      <?php switch($activity->getLabel()) {
             case 'CREATE': ?>
        <?php echo __('<span class="label success">%LABEL%</span>', array(
                                '%LABEL%' => $activity->getLabel())) ?>
        <?php   break; ?>
        <?php case 'UPDATE': ?>
        <?php echo __('<span class="label notice">%LABEL%</span>', array(
                                '%LABEL%' => $activity->getLabel())) ?>
        <?php   break; ?>
        <?php case 'DELETE': ?>
        <?php echo __('<span class="label important">%LABEL%</span>', array(
                                '%LABEL%' => $activity->getLabel())) ?>
        <?php   break; ?>
        <?php default: ?>
        <?php echo __('<span class="label %label%">%LABEL%</span>', array(
                                '%label%' =>  strtolower($activity->getLabel()),
                                '%LABEL%' => $activity->getLabel())) ?>
      <?php } // endswitch; ?>
      <?php echo __('%time_ago% ago', array(
                          "%time_ago%" => time_ago_in_words($activity->getCreatedAt('U'))));?>
    </li>
  <?php $is_first = false; ?>
    <?php endforeach; ?>
  </ul>
</section>
<?php
// vim:ft=php.html.sftemplate
?>
