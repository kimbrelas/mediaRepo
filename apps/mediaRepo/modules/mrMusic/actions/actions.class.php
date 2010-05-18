<?php

/**
 * mrMusic actions.
 *
 * @package    mediaRepo
 * @subpackage mrMusic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mrMusicActions extends mrActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->setupIndex('mrMusic', 'musics');
  }
  
  public function executeOrderSongs(sfWebRequest $request)
  {
    $album = $this->getRoute()->getObject();
    $album->orderSongs($request->getParameter('songs'));
    
    return sfView::NONE;
  }
  
  public function executeAddSong(sfWebRequest $request)
  {
    $song = new mrSong();
    $song->Album = $this->getRoute()->getObject();
    $this->form = new mrSongForm($song);
  }
  
  public function executeAddSongSubmit(sfWebRequest $request)
  {
    $song = new mrSong();
    $song->Album = $this->getRoute()->getObject();
    $this->form = new mrSongForm($song);

    $this->processSongForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  protected function processSongForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $song = $form->save();
      
      $this->redirect($this->generateUrl($this->base_route.'_show', $song->Album));
    }
  }
  
  public function executeProcessiTunesXml(sfWebRequest $request)
  {
    $xml = file_get_contents('php://input');

    $credentials = mediaRepo::extractXmlCredentials($xml);
    
    if($user = Doctrine_Core::getTable('sfGuardUser')->findOneByUsername($credentials['username']))
    {
      if($user->checkPassword($credentials['password']))
      {
        $itunes = new iTunesLibrary($xml, $user);
        $itunes->save();
      }
    }
    
    return sfView::NONE;
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->verifyObject();
    
    $this->music = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new mrMusicForm();
    $this->form->setDefault('status', $this->status);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new mrMusicForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->verifyObject();
    
    $this->form = new mrMusicForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new mrMusicForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect($this->generateUrl($this->base_route));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $music = $form->save();

      $this->redirect($this->generateUrl($this->base_route.'_edit', $music));
    }
  }
}
