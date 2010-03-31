<?php use_helper('MediaRepo') ?>
<?php if(!$sf_user->isAuthenticated()): ?>
	welcome
<?php else: ?>
	<?php echo get_breadcrumb_str($module) ?>
<?php endif; ?>