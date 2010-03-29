<?php

class mrTestFunctional extends sfTestFunctional
{
	public function login($user = 'admin')
	{
		$this->info('Logging in as '.$user)
			->get('/login')
			->click('sign in', array('signin' => array('username' => 'admin', 'password' => 'admin')))
			
			->with('form')->begin()
				->hasErrors(0)
			->end()
			
			->with('response')->begin()
				->isStatusCode(302)
				->isRedirected()->followRedirect()
			->end()
			
			->info('Successfully logged in as '.$user)
		;
		
		return $this;
	}
}