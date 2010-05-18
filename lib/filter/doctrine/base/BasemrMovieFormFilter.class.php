<?php

/**
 * mrMovie filter form base class.
 *
 * @package    mediaRepo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrMovieFormFilter extends mrMediaFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['format'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['format'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('mr_movie_filters[%s]');
  }

  public function getModelName()
  {
    return 'mrMovie';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'format' => 'Text',
    ));
  }
}
