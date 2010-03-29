<?php

/**
 * mrMovie form.
 *
 * @package    mediaRepo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mrMovieForm extends BasemrMovieForm
{
  public function setup()
  {
  	parent::setup();
  	
  	$this->useFields(array(
  		'name',
  		'medium',
  		'year',
  		'format'
  	));
  	
  	$this->setWidget('medium', new sfWidgetFormChoice(array('choices' => array_merge(array('' => 'Select one'), $this->getObject()->getTable()->getMediums()))));
  	$this->setWidget('format', new sfWidgetFormChoice(array('choices' => array_merge(array('' => 'Select one'), $this->getObject()->getTable()->getFormats()))));
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
