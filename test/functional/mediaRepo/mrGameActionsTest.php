<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser
	->get('/games')

  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('!/Gears of War/')
  ->end()
  
  ->click('New')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'new')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(200)
  ->end()
  
  ->click('Save', array('mr_game' => array('name' => 'Gears of War', 'medium' => 'Disc', 'year' => '2006', 'platform' => 'Xbox 360')))
  
  ->with('form')->begin()
  	->hasErrors(0)
  ->end()
	
  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'create')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(302)
  	->isRedirected()->followRedirect()
  ->end()
  
  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'edit')
  ->end()
  
  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/Gears of War/')
  ->end()
  
  ->get('/games')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/Gears of War/')
  ->end()
;