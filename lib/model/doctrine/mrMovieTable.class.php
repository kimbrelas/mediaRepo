<?php


class mrMovieTable extends Doctrine_Table
{
  public static function getInstance()
  {
    return Doctrine_Core::getTable('mrMovie');
  }
  
  public function getFormats()
  {
  	$formats = array(
  		'16:9 - Widescreen',
  		'4:3 - Fullscreen'
  	);
  	
  	return array_combine($formats, $formats);
  }
  
  public function getMediums()
  {
  	$mediums = array(
  		'DVD',
  		'Blu-ray',
  		'HD DVD',
  		'VHS',
  		'Digital'
  	);
  	
  	return array_combine($mediums, $mediums);
  }
}