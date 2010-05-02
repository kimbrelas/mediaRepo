<?php

class mrTestFunctional extends sfTestFunctional
{
  public function __construct(sfBrowserBase $browser, lime_test $lime = null, $testers = array())
  {
    parent::__construct($browser, $lime, $testers);
    
    $this->setTester('doctrine', 'sfTesterDoctrine');
  }
  
	public function login($user = 'admin', $password = 'admin')
	{
		$this->info('Logging in as '.$user)
			->get('/login')
			->click('sign in', array('signin' => array('username' => $user, 'password' => $password)))
			
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
