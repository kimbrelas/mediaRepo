<?php

/**
 * BasemrMovie
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $format
 * @property sfGuardUser $User
 * 
 * @method string      getFormat() Returns the current record's "format" value
 * @method sfGuardUser getUser()   Returns the current record's "User" value
 * @method mrMovie     setFormat() Sets the current record's "format" value
 * @method mrMovie     setUser()   Sets the current record's "User" value
 * 
 * @package    mediaRepo
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7380 2010-03-15 21:07:50Z jwage $
 */
abstract class BasemrMovie extends mrMedia
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('mr_movie');
        $this->hasColumn('format', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}