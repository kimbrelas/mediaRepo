<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new mrTestFunctional(new sfBrowser());

$browser->get('/account')

  ->with('request')->begin()
    ->isParameter('module', 'account')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(401)
  ->end()
  
  ->get('/books')

  ->with('request')->begin()
    ->isParameter('module', 'mrBook')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(401)
  ->end()
  
  ->get('/games')

  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(401)
  ->end()
  
  ->get('/movies')

  ->with('request')->begin()
    ->isParameter('module', 'mrMovie')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(401)
  ->end()
  
  ->get('/music')

  ->with('request')->begin()
    ->isParameter('module', 'mrMusic')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(401)
  ->end()
  
  ->get('/register')

  ->with('request')->begin()
    ->isParameter('module', 'account')
    ->isParameter('action', 'register')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/Username/')
    ->matches('/Password/')
    ->matches('/Password again/')
  ->end()
  
  ->click('Submit', array('sf_guard_user' => array('username' => 'functional', 'password' => 'functional', 'password_again' => 'functional')))
  
  ->with('form')->begin()
    ->hasErrors(0)
  ->end()
  
  ->with('response')->begin()
    ->isStatusCode(302)
    ->isRedirected()->followRedirect()
  ->end()
  
  ->with('request')->begin()
    ->isParameter('module', 'sfGuardAuth')
    ->isParameter('action', 'signin')
  ->end()
  
  ->login('functional', 'functional')
  
  ->with('request')->begin()
    ->isParameter('module', 'account')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
  ->end()
  
  ->get('/books')

  ->with('request')->begin()
    ->isParameter('module', 'mrBook')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
  ->end()
  
  ->get('/games')

  ->with('request')->begin()
    ->isParameter('module', 'mrGame')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
  ->end()
  
  ->get('/movies')

  ->with('request')->begin()
    ->isParameter('module', 'mrMovie')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
  ->end()
  
  ->get('/music')

  ->with('request')->begin()
    ->isParameter('module', 'mrMusic')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
  ->end()
  
  ->get('/register')

  ->with('request')->begin()
    ->isParameter('module', 'account')
    ->isParameter('action', 'register')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(302)
    ->isRedirected()->followRedirect()
  ->end()
  
  ->with('request')->begin()
    ->isParameter('module', 'account')
    ->isParameter('action', 'index')
  ->end()
  
  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/functional/')
  ->end()
;