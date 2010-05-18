<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new mrTestFunctional(new sfBrowser());

$browser->login()

  ->get('/games')

  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('!/Gears of War/')
  ->end()
  
  ->click('Add Game')
  
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
  
  ->with('doctrine')->begin()
    ->check('mrGame', array('name' => 'Gears of War', 'status' => 'owned'))
  ->end()
  
  ->get('/games/wishlist')

  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('!/Halo 3/')
    ->matches('!/Gears of War/')
  ->end()
  
  ->click('Add Game')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'new')
  ->end()
  
  ->with('response')->begin()
    ->isStatusCode(200)
  ->end()
  
  ->click('Save', array('mr_game' => array('name' => 'Halo 3', 'medium' => 'Disc', 'year' => '2007', 'platform' => 'Xbox 360')))
  
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
    ->matches('/Halo 3/')
  ->end()
  
  ->get('/games/wishlist')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/Halo 3/')
    ->matches('!/Gears of War/')
  ->end()
  
  ->with('doctrine')->begin()
    ->check('mrGame', array('name' => 'Halo 3', 'status' => 'wishlist'))
  ->end()
  
  ->get('/games')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('!/Halo 3/')
    ->matches('/Gears of War/')
  ->end()
;
