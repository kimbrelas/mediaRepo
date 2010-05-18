<?php

class registerForm extends sfGuardUserAdminForm
{
  public function setup()
  {
    parent::setup();
    
    $this->useFields(array(
      'username',
      'password',
      'password_again'
    ));
  }
}