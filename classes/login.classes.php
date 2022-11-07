<?php

class Login extends Dbh
{
  protected function getUser($alias, $pwd)
  {
    // $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_alias = ? OR users_email = ?;');
    $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_alias = ? OR users_email = ?;');

    if (!$stmt->execute(array($alias, $alias))) {
      $stmt = null;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = null;
      header("location: ../index.php?error=usernotfound");
      exit();
    }

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $checkPwd = password_verify($pwd, $user[0]["users_pwd"]);

    if (!$checkPwd) {
      $stmt = null;
      header("location: ../index.php?error=wrongpassword");
      exit();
    }

    session_start();
    $_SESSION["userid"] = $user[0]["users_id"];
    $_SESSION["useralias"] = $user[0]["users_alias"];

    $stmt = null;
  }
}
