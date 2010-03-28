<?php


class mrMusicTable extends Doctrine_Table
{
  public static function getInstance()
  {
    return Doctrine_Core::getTable('mrMusic');
  }
  
	public function getMediums()
  {
  	$mediums = array(
  		'CD',
  		'Cassette',
  		'Digital'
  	);
  	
  	return array_combine($mediums, $mediums);
  }
}