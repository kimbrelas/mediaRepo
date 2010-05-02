<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new mrTestFunctional(new sfBrowser());

$browser->login()

	->get('/movies/owned')

  ->with('request')->begin()
    ->isParameter('module', 'mrMovie')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('!/Pretty Woman/')
  ->end()
  
  ->click('Add Movie')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrMovie')
    ->isParameter('action', 'new')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(200)
  ->end()
  
  ->click('Save', array('mr_movie' => array('name' => 'Pretty Woman', 'medium' => 'DVD', 'status' => 'owned', 'year' => '1990', 'format' => '16:9')))
  
  ->with('form')->begin()
  	->hasErrors(0)
  ->end()
	
  ->with('request')->begin()
    ->isParameter('module', 'mrMovie')
    ->isParameter('action', 'create')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(302)
  	->isRedirected()->followRedirect()
  ->end()
  
  ->with('request')->begin()
    ->isParameter('module', 'mrMovie')
    ->isParameter('action', 'edit')
  ->end()
  
  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/Pretty Woman/')
  ->end()
  
  ->get('/movies/owned')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrMovie')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/Pretty Woman/')
  ->end()
;
