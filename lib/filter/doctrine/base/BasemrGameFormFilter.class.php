<?php

/**
 * mrGame filter form base class.
 *
 * @package    mediaRepo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrGameFormFilter extends mrMediaFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['platform'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['platform'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('mr_game_filters[%s]');
  }

  public function getModelName()
  {
    return 'mrGame';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'platform' => 'Text',
    ));
  }
}
