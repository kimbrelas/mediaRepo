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
  	
  	$this->setWidget('medium', new sfWidgetFormChoice(array('choices' => $this->getObject()->getTable()->getMediums())));
  	$this->setWidget('format', new sfWidgetFormChoice(array('expanded' => true, 'choices' => $this->getObject()->getTable()->getFormats())));
  }
}
