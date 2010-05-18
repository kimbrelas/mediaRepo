<?php

/**
 * mrBook filter form base class.
 *
 * @package    mediaRepo
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasemrBookFormFilter extends mrMediaFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema   ['author'] = new sfWidgetFormFilterInput();
    $this->validatorSchema['author'] = new sfValidatorPass(array('required' => false));

    $this->widgetSchema->setNameFormat('mr_book_filters[%s]');
  }

  public function getModelName()
  {
    return 'mrBook';
  }

  public function getFields()
  {
    return array_merge(parent::getFields(), array(
      'author' => 'Text',
    ));
  }
}
