<?php

class Register extends Dbh
{
  protected function setUser($alias, $pwd, $email)
  {
    $stmt = $this->connect()->prepare("INSERT INTO users (users_alias, users_pwd, users_email) VALUES (?, ?, ?);");

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if (!$stmt->execute(array($alias, $hashedPwd, $email))) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $stmt = null;
  }

  protected function userExist($alias, $email)
  {
    $stmt = $this->connect()->prepare('SELECT users_alias FROM users WHERE users_alias = ? OR users_email = ?;');

    if (!$stmt->execute(array($alias, $email))) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    return $stmt->rowCount() > 0;
  }
}
