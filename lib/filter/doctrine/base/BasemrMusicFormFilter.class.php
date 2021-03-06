<?php

/**
 * mrMusic filter form base class.
 *
 * @package    mediaRepo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrMusicFormFilter extends mrMediaFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['artist'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['artist'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('mr_music_filters[%s]');
  }

  public function getModelName()
  {
    return 'mrMusic';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'artist' => 'Text',
    ));
  }
}
