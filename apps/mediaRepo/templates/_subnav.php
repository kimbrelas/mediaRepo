<?php slot('subnav') ?>
  <?php foreach($statuses as $key => $val): ?>
    <?php if($status == $key): ?>
      <?php echo $val.' '.$media ?>
    <?php else: ?>
      <a href="<?php echo url_for($media.($key == 'owned' ? '' : '_'.$key)) ?>"><?php echo $val.' '.$media ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
<?php end_slot(); ?>
