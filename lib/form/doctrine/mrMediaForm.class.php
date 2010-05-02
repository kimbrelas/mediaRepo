<?php

/**
 * mrMedia form.
 *
 * @package    mediaRepo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mrMediaForm extends BasemrMediaForm
{
  public function setup()
  {
    parent::setup();
    
    $this->setWidget('medium', new sfWidgetFormChoice(array('choices' => array_merge(array('' => 'Select one'), $this->getObject()->getTable()->getMediums()))));
    $this->setWidget('status', new sfWidgetFormChoice(array('choices' => array('' => 'Select one', 'owned' => 'Owned', 'wishlist' => 'Wishlist'))));
    
    $this->validatorSchema['name']->setOption('required', true);
    $this->validatorSchema['medium']->setOption('required', true);
    $this->validatorSchema['year']->setOption('required', true);
    $this->validatorSchema['status']->setOption('required', true);
  }
  
  public function doSave($con = null)
  {
    if($this->getObject()->isNew())
    {
      $this->getObject()->user_id = sfContext::getInstance()->getUser()->getGuardUser()->id;
    }
    
    parent::doSave($con);
  }
}
