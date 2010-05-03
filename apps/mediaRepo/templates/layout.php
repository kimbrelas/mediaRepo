<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
		<div id="top-bar">
			<?php if($sf_user->isAuthenticated()): ?>
				<div class="top-bar-logout">
			    <a href="<?php echo url_for('sf_guard_signout') ?>"></a>
			  </div>
			<?php else: ?>
				<div class="top-bar-login">
			    <a href="<?php echo url_for('sf_guard_signin') ?>"></a>
			  </div>
	    <?php endif; ?>
      <?php /*
	    <div class="social-icons">
	    	<a href="#"><img src="/images/facebook.png" alt="Facebook" /></a>
	      <a href="#"><img src="/images/twitter.png" alt="Twitter" /></a>
	    </div> */ ?>
		</div>
		<div id="container">
			<div id="header"></div>
			<div id="nav">
	    	<?php include_partial('global/mainNav', array('module' => $sf_context->getModuleName())) ?>
		  </div>
		  <div id="content">
		  	<div id="inner-content">
		  		<?php if(!$sf_user->isAuthenticated()): ?>
			  		<div class="login-btn">
							<a href="<?php echo url_for('register') ?>"><img src="/images/register-btn.png" alt="Register Now" /></a>
						</div>
					<?php endif; ?>
					<h3>libdit
						<span>
							<span> | </span>
							<?php include_slot('subnav'); ?>
						</span>
					</h3>
					<div class="border-shadow"></div>
		    	<?php echo $sf_content ?>
		    </div>
		  </div>
		  <div id="footer">
		  	<?php include_partial('global/footerNav') ?>
			</div>
		</div>
  </body>
</html>
