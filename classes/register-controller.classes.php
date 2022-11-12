<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class RegisterController extends Register
{
  private $alias;
  private $email;
  private $pwd;
  private $pwdrepeat;

  public function __construct($alias, $email, $pwd, $pwdrepeat)
  {
    $this->alias = $alias;
    $this->email = $email;
    $this->pwd = $pwd;
    $this->pwdrepeat = $pwdrepeat;
  }

  public function registerUser()
  {
    if (!$this->inputIsValid()) {
      header("location: ../index.php?error=emptyinput");
      exit();
    }
    if (!$this->aliasIsValid()) {
      header("location: ../index.php?error=invalidusername");
      exit();
    }
    if (!$this->emailIsValid()) {
      header("location: ../index.php?error=invalidemail");
      exit();
    }
    if (!$this->pwdsDoMatch()) {
      header("location: ../index.php?error=nopasswordmatch");
      exit();
    }
    if ($this->doesUserExist()) {
      header("location: ../index.php?error=alreadyexists");
      exit();
    }

    $this->setUser($this->alias, $this->pwd, $this->email);
  }

  private function inputIsValid()
  {
    return !empty($this->alias) && !empty($this->pwd) && !empty($this->pwdrepeat) && !empty($this->email);
  }

  private function aliasIsValid()
  {
    return preg_match("/^[a-zA-Z0-9]*$/", $this->alias);
  }

  private function emailIsValid()
  {
    return filter_var($this->email, FILTER_VALIDATE_EMAIL);
  }

  private function pwdsDoMatch()
  {
    return $this->pwd == $this->pwdrepeat;
  }

  private function doesUserExist()
  {
    return $this->userExist($this->alias, $this->email);
  }
}
