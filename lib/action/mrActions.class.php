<?php

class mrActions extends sfActions
{
  protected $_media = array(
    'books',
    'games',
    'movies',
    'musics'
  );
  
  public function verifyObject()
  {
    $obj = $this->getRoute()->getObject();
    
    $this->verifyStatus($obj);
    $this->verifyOwner($obj);
  }
  
  /**
   * verify that the current user if the owner of the object queried for
   */
  public function verifyOwner($obj)
  {
    $this->forward404Unless($this->getUser()->getGuardUser()->id == $obj->user_id);
  }
  
  /**
   * make sure the object status matches the route status
   */
  public function verifyStatus($obj)
  {
    $this->forward404Unless(($this->status == $obj->status));
  }
  
  /**
   * setup all the vars for the index action
   */
  public function setupIndex($class, $var)
  {
    $q = Doctrine_Query::create()
      ->from($class)
      ->where('status = ?', $this->status);
    
    $this->$var = $q->execute();
  }
  
  /**
   * handle setting of status and base_route as well as verifying the object
   */
  public function preExecute()
  {
    $route  = explode('/', substr($this->getRequest()->getPathInfo(), 1));
    $base   = $route[0];
    
    if(in_array($base, $this->_media));
    {
      $this->media = $base;
      $this->statuses = sfConfig::get('app_media_statuses');
      $this->status = $this->getStatus($route);
      $this->base_route = ($this->status == 'owned') ? $base : $base.'_'.$this->status;
      
      $this->renderPartial('global/subnav');
    }
  }
  
  /**
   * get the status based on the current route
   */
  public function getStatus($route)
  {
    if(isset($route[1]))
    {
      $status = $route[1];
      
      if(in_array($status, array_keys($this->statuses)))
      {
        return $status;
      }
    }
    
    return 'owned';
  }
}
