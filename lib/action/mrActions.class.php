<?php

class mrActions extends sfActions
{
  protected $_media = array(
    'books',
    'games',
    'movies',
    'musics'
  );
  
	public function verifyOwner()
	{
		$this->forward404Unless($this->getUser()->getGuardUser()->id == $this->getRoute()->getObject()->user_id);
	}
  
  public function setupIndex($class, $var)
  {
    $q = Doctrine_Query::create()
      ->from($class)
      ->where('status = ?', $this->status);
    
    $this->$var = $q->execute();
  }
  
  public function preExecute()
  {
    $statusArr = array(
      'owned',
      'wishlist'
    );
    
    $route  = explode('/', substr($this->getRequest()->getPathInfo(), 1));
    $base   = $route[0];
    
    if(in_array($base, $this->_media));
    {
      if(isset($route[1]))
      {
        $status = $route[1];
        if(in_array($status, $statusArr))
        {
          $this->status = $status;
        }
        else
        {
          $this->status = 'owned';
        }
      }
      else
      {
        $this->status = 'owned';
      }
      
      $this->base_route = ($this->status == 'owned') ? $base : $base.'_'.$this->status;
    }
  }
}
