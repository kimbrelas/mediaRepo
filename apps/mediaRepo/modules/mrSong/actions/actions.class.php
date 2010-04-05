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
  public function executeIndex(sfWebRequest $request)
  {
    $this->songs = $this->getRoute()->getObjects();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->song = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new mrSongForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new mrSongForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new mrSongForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new mrSongForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
		
    $song = $this->getRoute()->getObject();
    $album = $song->Album;
    
    $song->delete();

    $this->redirect($this->generateUrl('music_show', $album));
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $song = $form->save();

      $this->redirect('mrSong/edit?id='.$song->getId());
    }
  }
}
