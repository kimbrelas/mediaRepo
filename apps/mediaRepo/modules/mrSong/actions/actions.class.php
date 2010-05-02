<?php

/**
 * mrSong actions.
 *
 * @package    mediaRepo
 * @subpackage mrSong
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mrSongActions extends mrActions
{
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
		
    $song = $this->getRoute()->getObject();
    $album = $song->Album;
    
    $song->delete();

    $this->redirect($this->generateUrl($this->base_route.'_show', $album));
  }
}
