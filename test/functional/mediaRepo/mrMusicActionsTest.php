<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser
	->get('/music')

  ->with('request')->begin()
    ->isParameter('module', 'mrMusic')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('!/In the Aeroplane Over the Sea/')
  ->end()
  
  ->click('New')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrMusic')
    ->isParameter('action', 'new')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(200)
  ->end()
  
  ->click('Save', array('mr_music' => array('name' => 'In the Aeroplane Over the Sea', 'medium' => 'CD', 'year' => '1998', 'artist' => 'Neutral Milk Hotel')))
  
  ->with('form')->begin()
  	->hasErrors(0)
  ->end()
	
  ->with('request')->begin()
    ->isParameter('module', 'mrMusic')
    ->isParameter('action', 'create')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(302)
  	->isRedirected()->followRedirect()
  ->end()
  
  ->with('request')->begin()
    ->isParameter('module', 'mrMusic')
    ->isParameter('action', 'edit')
  ->end()
  
  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/In the Aeroplane Over the Sea/')
  ->end()
  
  ->get('/music')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrMusic')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/In the Aeroplane Over the Sea/')
  ->end()
;