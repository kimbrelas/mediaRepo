<?php

/**
 * mrMusic form base class.
 *
 * @method mrMusic getObject() Returns the current form's model object
 *
 * @package    mediaRepo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrMusicForm extends mrMediaForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['artist'] = new sfWidgetFormInputText();
    $this->validatorSchema['artist'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

    $this->widgetSchema->setNameFormat('mr_music[%s]');
  }

  public function getModelName()
  {
    return 'mrMusic';
  }

}
