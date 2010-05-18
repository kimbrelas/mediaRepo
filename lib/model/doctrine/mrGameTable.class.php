<?php

class mrGameTable extends Doctrine_Table
{
  public static function getInstance()
  {
    return Doctrine_Core::getTable('mrGame');
  }
  
  public function getMediums()
  {
    $mediums = array(
      'Disc',
      'Cartridge',
      'Digital'
    );
    
    return array_combine($mediums, $mediums);
  }
  
  public function getPlatforms()
  {
    $platforms = array(
      'Atari',
      'Gameboy',
      'Gameboy Advance',
      'Gamecube',
      'Nintento 64',
      'Nintendo DS',
      'Sega Dreamcast',
      'Sega Genesis',
      'Sega Saturn',
      'Sony Playstation',
      'Sony Playstation 2',
      'Sony Playstation 3',
      'Sony PSP',
      'Super Nintendo',
      'Wii',
      'Xbox 360',
      'Xbox',
      'Xbox Live'
    );
    
    return array_combine($platforms, $platforms);
  }
}