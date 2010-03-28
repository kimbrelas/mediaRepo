<?php

/**
 * mrBook filter form base class.
 *
 * @package    mediaRepo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrBookFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'     => new sfWidgetFormFilterInput(),
      'medium'   => new sfWidgetFormFilterInput(),
      'year'     => new sfWidgetFormFilterInput(),
      'author'   => new sfWidgetFormFilterInput(),
      'hardback' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'user_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'     => new sfValidatorPass(array('required' => false)),
      'medium'   => new sfValidatorPass(array('required' => false)),
      'year'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'author'   => new sfValidatorPass(array('required' => false)),
      'hardback' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'user_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('mr_book_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mrBook';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'name'     => 'Text',
      'medium'   => 'Text',
      'year'     => 'Number',
      'author'   => 'Text',
      'hardback' => 'Boolean',
      'user_id'  => 'ForeignKey',
    );
  }
}
