<?php

class LoginController extends Login
{
  private $alias;
  private $pwd;

  public function __construct($alias, $pwd)
  {
    $this->alias = $alias;
    $this->pwd = $pwd;
  }

  public function loginUser()
  {
    if (!$this->inputIsValid()) {
      // Echo "Empty input"
      header("location: ../index.php?error=emptyinput");
      exit();
    }

    $this->getUser($this->alias, $this->pwd);
  }

  private function inputIsValid()
  {
    return !empty($this->alias) && !empty($this->pwd);
  }
}
