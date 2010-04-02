<?php

class iTunesLibrary
{
	public function __construct($xmlString, sfGuardUser $user)
	{
		// create a DOMDocument from the xml string
	  $dom = new DOMDocument();
		$dom->loadXML($xmlString);
		
		// get root and child nodes
		$root = $dom->documentElement;

		// find dict node and set it to root
		$children = $root->childNodes;
		foreach($children as $child)
		{
			if ($child->nodeName == "dict")
			{
				$root = $child;
				break;
			}
		}
		
		// find inner dict node and set it to root
		$children = $root->childNodes;
		foreach($children as $child)
		{
			if ($child->nodeName == "dict")
			{
				$root = $child;
				break;
			}
		}
		
		// find third inner dict node -- this is the actual song node
		$children = $root->childNodes;
		foreach($children as $child)
		{
			if($child->nodeName == "dict")
			{
				$song = null;
				
				// set up song associative array
				$elements = $child->childNodes;
				for ($i = 0; $i < $elements->length; $i++)
				{
					if($elements->item($i)->nodeName == "key")
					{
						$key = $elements->item($i)->textContent;
						$i++;
						$value = $elements->item($i)->textContent;
						$song[$key] = $value;
					}
				}
				
				// add the song to the songs array
				if($song)
				{
					$songs[] = $song;
				}
			}
		}
		
		$this->songs = $songs;
		$this->user = $user;
	}
	
	/**
	 * add albums from the user's itunes library to the DB
	 */
	public function save()
	{
  	$processed = array();

  	foreach($this->songs as $song)
  	{
  		$id = $song['Album'].$song['Artist'];
  		
  		if(!in_array($id, $processed) )
  		{
	  		$processed[] = $id;
	  		
	  		// if the album exists already, don't add it
	  		$album = Doctrine_Query::create()
	  			->from('mrMusic')
	  			->where('name = ?', $song['Album'])
	  			->andWhere('artist = ?', $song['Artist'])
	  			->andWhere('user_id = ?', $this->user->id)
	  			->andWhere('year = ?', $song['Year'])
	  			->andWhere('medium = ?', 'Digital')
	  			->fetchOne();
	  			
	  		if(!$album)
	  		{
		  		// add the album to the database
			  	$music = new mrMusic();
			  	$music->name   = $song['Album'];
			  	$music->medium = 'Digital';
			  	$music->year   = $song['Year'];
			  	$music->artist = $song['Artist'];
			  	$music->User   = $this->user;
			  	$music->save();
	  		}
  		}
  	}
	}
}