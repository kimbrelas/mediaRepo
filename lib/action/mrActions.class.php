<?php

class mrActions extends sfActions
{
	public function verifyOwner()
	{
		$this->forward404Unless($this->getUser()->getGuardUser()->id == $this->getRoute()->getObject()->user_id);
	}
  
  public function setupIndex(sfWebRequest $request, $class, $var)
  {
    $q = Doctrine_Query::create()
      ->from($class)
      ->where('status = ?', $request->getParameter('status'));
    $this->$var = $q->execute();
  }
}
