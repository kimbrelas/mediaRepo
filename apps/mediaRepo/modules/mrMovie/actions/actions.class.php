<?php

/**
 * mrMovie actions.
 *
 * @package    mediaRepo
 * @subpackage mrMovie
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mrMovieActions extends mrActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->setupIndex('mrMovie', 'movies');
  }

  public function executeShow(sfWebRequest $request)
  {
  	$this->verifyObject();
  	
    $this->movie = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new mrMovieForm();
    $this->form->setDefault('status', $this->status);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new mrMovieForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	$this->verifyObject();
  	
    $this->form = new mrMovieForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new mrMovieForm($this->getRoute()->getObject());

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
      $movie = $form->save();

      $this->redirect($this->generateUrl($this->base_route.'_edit', $movie));
    }
  }
}
