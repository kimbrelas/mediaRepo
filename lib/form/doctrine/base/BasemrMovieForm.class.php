<?php

/**
 * mrMovie form base class.
 *
 * @method mrMovie getObject() Returns the current form's model object
 *
 * @package    mediaRepo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrMovieForm extends mrMediaForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['format'] = new sfWidgetFormInputText();
    $this->validatorSchema['format'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

    $this->widgetSchema->setNameFormat('mr_movie[%s]');
  }

  public function getModelName()
  {
    return 'mrMovie';
  }

}
