<?php

/**
 * BasemrMusic
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $medium
 * @property integer $year
 * @property string $artist
 * @property integer $user_id
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Songs
 * 
 * @method string              getName()    Returns the current record's "name" value
 * @method string              getMedium()  Returns the current record's "medium" value
 * @method integer             getYear()    Returns the current record's "year" value
 * @method string              getArtist()  Returns the current record's "artist" value
 * @method integer             getUserId()  Returns the current record's "user_id" value
 * @method sfGuardUser         getUser()    Returns the current record's "User" value
 * @method Doctrine_Collection getSongs()   Returns the current record's "Songs" collection
 * @method mrMusic             setName()    Sets the current record's "name" value
 * @method mrMusic             setMedium()  Sets the current record's "medium" value
 * @method mrMusic             setYear()    Sets the current record's "year" value
 * @method mrMusic             setArtist()  Sets the current record's "artist" value
 * @method mrMusic             setUserId()  Sets the current record's "user_id" value
 * @method mrMusic             setUser()    Sets the current record's "User" value
 * @method mrMusic             setSongs()   Sets the current record's "Songs" collection
 * 
 * @package    mediaRepo
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7380 2010-03-15 21:07:50Z jwage $
 */
abstract class BasemrMusic extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mr_music');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('medium', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('year', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('artist', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('mrSong as Songs', array(
             'local' => 'id',
             'foreign' => 'album_id'));
    }
}