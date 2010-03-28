<?php

/**
 * mrMusic filter form base class.
 *
 * @package    mediaRepo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrMusicFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormFilterInput(),
      'medium'  => new sfWidgetFormFilterInput(),
      'year'    => new sfWidgetFormFilterInput(),
      'artist'  => new sfWidgetFormFilterInput(),
      'user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'    => new sfValidatorPass(array('required' => false)),
      'medium'  => new sfValidatorPass(array('required' => false)),
      'year'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'artist'  => new sfValidatorPass(array('required' => false)),
      'user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('mr_music_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mrMusic';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'name'    => 'Text',
      'medium'  => 'Text',
      'year'    => 'Number',
      'artist'  => 'Text',
      'user_id' => 'ForeignKey',
    );
  }
}
