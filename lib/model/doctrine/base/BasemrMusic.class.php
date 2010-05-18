<?php

/**
 * BasemrMusic
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $artist
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Songs
 * 
 * @method string              getArtist() Returns the current record's "artist" value
 * @method sfGuardUser         getUser()   Returns the current record's "User" value
 * @method Doctrine_Collection getSongs()  Returns the current record's "Songs" collection
 * @method mrMusic             setArtist() Sets the current record's "artist" value
 * @method mrMusic             setUser()   Sets the current record's "User" value
 * @method mrMusic             setSongs()  Sets the current record's "Songs" collection
 * 
 * @package    mediaRepo
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7380 2010-03-15 21:07:50Z jwage $
 */
abstract class BasemrMusic extends mrMedia
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('mr_music');
        $this->hasColumn('artist', 'string', 255, array(
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

        $this->hasMany('mrSong as Songs', array(
             'local' => 'id',
             'foreign' => 'album_id'));
    }
}