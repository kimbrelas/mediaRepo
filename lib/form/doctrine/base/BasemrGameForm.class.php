<?php

/**
 * mrGame form base class.
 *
 * @method mrGame getObject() Returns the current form's model object
 *
 * @package    mediaRepo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrGameForm extends mrMediaForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['platform'] = new sfWidgetFormInputText();
    $this->validatorSchema['platform'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

    $this->widgetSchema->setNameFormat('mr_game[%s]');
  }

  public function getModelName()
  {
    return 'mrGame';
  }

}
