<ul>
	<li class="profile" <?php if($module == 'account'): ?>id="activated"<?php endif; ?>><a href="<?php echo url_for('account') ?>">Profile</a></li>
	<li class="books" <?php if($module == 'mrBook'): ?>id="activated"<?php endif; ?>><a href="<?php echo url_for('books') ?>">Books</a></li>
	<li class="games" <?php if($module == 'mrGame'): ?>id="activated"<?php endif; ?>><a href="<?php echo url_for('games') ?>">Games</a></li>
	<li class="movies" <?php if($module == 'mrMovie'): ?>id="activated"<?php endif; ?>><a href="<?php echo url_for('movies') ?>">Movies</a></li>
	<li class="music" <?php if($module == 'mrMusic'): ?>id="activated"<?php endif; ?>><a href="<?php echo url_for('music') ?>">Music</a></li>
</ul>

<?php /*
<?php if(!$sf_user->isAuthenticated()): ?>
	Not logged in
	<a href="<?php echo url_for('sf_guard_signin') ?>">Login</a> or <a href="<?php echo url_for('register') ?>">Register</a>
<?php else: ?>
	Logged in as <?php echo $sf_user->getGuardUser()->username ?>
	<a href="<?php echo url_for('sf_guard_signout') ?>">Logout</a>
<?php endif; ?>
*/ ?>