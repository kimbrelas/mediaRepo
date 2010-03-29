<a href="<?php echo url_for('account') ?>">Account</a>
<a href="<?php echo url_for('books') ?>">Books</a>
<a href="<?php echo url_for('games') ?>">Games</a>
<a href="<?php echo url_for('movies') ?>">Movies</a>
<a href="<?php echo url_for('music') ?>">Music</a>

<?php if(!$sf_user->isAuthenticated()): ?>
	Not logged in
	<a href="<?php echo url_for('sf_guard_signin') ?>">Login</a> or <a href="<?php echo url_for('register') ?>">Register</a>
<?php else: ?>
	Logged in as <?php echo $sf_user->getGuardUser()->username ?>
	<a href="<?php echo url_for('sf_guard_signout') ?>">Logout</a>
<?php endif; ?>