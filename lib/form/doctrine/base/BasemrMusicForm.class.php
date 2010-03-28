<?php

/**
 * mrMusic form base class.
 *
 * @method mrMusic getObject() Returns the current form's model object
 *
 * @package    mediaRepo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrMusicForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInputText(),
      'medium'  => new sfWidgetFormInputText(),
      'year'    => new sfWidgetFormInputText(),
      'artist'  => new sfWidgetFormInputText(),
      'user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'medium'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'year'    => new sfValidatorInteger(array('required' => false)),
      'artist'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mr_music[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mrMusic';
  }

}
