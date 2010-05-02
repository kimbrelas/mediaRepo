<?php

/**
 * mrGame actions.
 *
 * @package    mediaRepo
 * @subpackage mrGame
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mrGameActions extends mrActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->setupIndex($request, 'mrGame', 'games');
  }

  public function executeShow(sfWebRequest $request)
  {
  	$this->verifyOwner();
  	
    $this->game = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new mrGameForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new mrGameForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	$this->verifyOwner();
  	
    $this->form = new mrGameForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new mrGameForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('mrGame/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $game = $form->save();

      $this->redirect('mrGame/edit?id='.$game->getId());
    }
  }
}
