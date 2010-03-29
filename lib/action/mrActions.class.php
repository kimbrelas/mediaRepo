<?php

class mrActions extends sfActions
{
	public function verifyOwner()
	{
		$this->forward404Unless($this->getUser()->getGuardUser()->id == $this->getRoute()->getObject()->user_id);
	}
}