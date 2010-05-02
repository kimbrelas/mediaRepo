<?php

class mrActions extends sfActions
{
  protected $_media = array(
    'books',
    'games',
    'movies',
    'musics'
  );
  
  protected $_statusArr = array(
    'owned',
    'wishlist'
  );
  
	public function verifyOwner()
	{
		$this->forward404Unless($this->getUser()->getGuardUser()->id == $this->getRoute()->getObject()->user_id);
	}
  
  public function verifyStatus()
  {
    $opt = $this->getRoute()->getOptions();
    
    if($opt['type'] == 'object')
    {
      $this->forward404Unless($this->status == $this->getRoute()->getObject()->status);
    }
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
    $route  = explode('/', substr($this->getRequest()->getPathInfo(), 1));
    $base   = $route[0];
    
    if(in_array($base, $this->_media));
    {
      $this->status = $this->getStatus($route);
      $this->base_route = ($this->status == 'owned') ? $base : $base.'_'.$this->status;
      
      $this->verifyStatus();
    }
  }
  
  public function getStatus($route)
  {
    if(isset($route[1]))
    {
      $status = $route[1];
      
      if(in_array($status, $this->_statusArr))
      {
        return $status;
      }
    }
    
    return 'owned';
  }
}
