<h1>Register</h1>

<form action="<?php echo url_for('register_submit') ?>" method="post">
	<?php echo $form->renderGlobalErrors() ?>
	<?php echo $form->renderHiddenFields() ?>
	
	<table>
		<?php echo $form['username']->renderRow() ?>
		<?php echo $form['password']->renderRow() ?>
		<?php echo $form['password_again']->renderRow() ?>
	</table>
	
	<input type="submit" value="Submit" />
</form>