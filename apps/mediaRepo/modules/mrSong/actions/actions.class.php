<?php

/**
 * mrSong actions.
 *
 * @package    mediaRepo
 * @subpackage mrSong
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mrSongActions extends sfActions
{
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    
    $this->status = $request->getParameter('status');
    $song = $this->getRoute()->getObject();
    $album = $song->Album;
    
    $song->delete();
    
    $route = ($this->status == 'owned') ? 'music_show' : 'mr_music_'.$this->status.'_show';

    $this->redirect($this->generateUrl($route, $album));
  }
}
