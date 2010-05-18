<?php

class accountActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->user = $this->getUser()->getGuardUser();
	}
	
	public function executeRegister(sfWebRequest $request)
	{
		if($this->getUser()->isAuthenticated())
		{
			$this->redirect('account/index');
		}
		
		$this->form = new registerForm();
	}
	
	public function executeRegisterSubmit(sfWebRequest $request)
	{
		$this->form = new registerForm();

    $this->processRegisterForm($request, $this->form);

    $this->setTemplate('register');
	}
	
	public function processRegisterForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $user = $form->save();

      $this->redirect('sf_guard_signin');
    }
	}
}