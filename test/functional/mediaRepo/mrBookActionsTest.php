<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new mrTestFunctional(new sfBrowser());

$browser->login()

	->get('/books')

  ->with('request')->begin()
    ->isParameter('module', 'mrBook')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('!/A Game of Thrones/')
  ->end()
  
  ->click('Add Book')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrBook')
    ->isParameter('action', 'new')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(200)
  ->end()
  
  ->click('Save', array('mr_book' => array('name' => 'A Game of Thrones', 'medium' => 'Hardback', 'year' => '1997', 'author' => 'George R.R. Martin')))
  
  ->with('form')->begin()
  	->hasErrors(0)
  ->end()
	
  ->with('request')->begin()
    ->isParameter('module', 'mrBook')
    ->isParameter('action', 'create')
  ->end()
  
  ->with('response')->begin()
  	->isStatusCode(302)
  	->isRedirected()->followRedirect()
  ->end()
  
  ->with('request')->begin()
    ->isParameter('module', 'mrBook')
    ->isParameter('action', 'edit')
  ->end()
  
  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/A Game of Thrones/')
  ->end()
  
  ->get('/books')
  
  ->with('request')->begin()
    ->isParameter('module', 'mrBook')
    ->isParameter('action', 'index')
  ->end()

  ->with('response')->begin()
    ->isStatusCode(200)
    ->matches('/A Game of Thrones/')
  ->end()
;