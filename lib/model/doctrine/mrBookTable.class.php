<?php


class mrBookTable extends Doctrine_Table
{
  public static function getInstance()
  {
    return Doctrine_Core::getTable('mrBook');
  }
  
	public function getMediums()
  {
  	$mediums = array(
  		'Paperback',
  		'Hardback',
  		'Digital'
  	);
  	
  	return array_combine($mediums, $mediums);
  }
}