<?php

/**
 * mrBook form base class.
 *
 * @method mrBook getObject() Returns the current form's model object
 *
 * @package    mediaRepo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrBookForm extends mrMediaForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['author'] = new sfWidgetFormInputText();
    $this->validatorSchema['author'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

    $this->widgetSchema->setNameFormat('mr_book[%s]');
  }

  public function getModelName()
  {
    return 'mrBook';
  }

}
