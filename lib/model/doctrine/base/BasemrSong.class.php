<?php

/**
 * BasemrSong
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property integer $album_id
 * @property integer $position
 * @property mrMusic $Album
 * 
 * @method string  getName()     Returns the current record's "name" value
 * @method integer getAlbumId()  Returns the current record's "album_id" value
 * @method integer getPosition() Returns the current record's "position" value
 * @method mrMusic getAlbum()    Returns the current record's "Album" value
 * @method mrSong  setName()     Sets the current record's "name" value
 * @method mrSong  setAlbumId()  Sets the current record's "album_id" value
 * @method mrSong  setPosition() Sets the current record's "position" value
 * @method mrSong  setAlbum()    Sets the current record's "Album" value
 * 
 * @package    mediaRepo
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7380 2010-03-15 21:07:50Z jwage $
 */
abstract class BasemrSong extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mr_song');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('album_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => '8',
             ));
        $this->hasColumn('position', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));

        $this->option('orderBy', 'position ASC');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('mrMusic as Album', array(
             'local' => 'album_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));
    }
}