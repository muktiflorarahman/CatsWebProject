<?php
    //kollar input så att det verkar lämpligt 
    class RegisterController extends Register{
        private $alias;
        private $email;
        private $pwd; 
        private $pwdRepeat;

        public function __construct($alias, $email, $pwd, $pwdRepeat){
            $this->alias = $alias;
            $this->email = $email; 
            $this->pwd = $pwd; 
            $this->pwdRepeat = $pwdRepeat; 
        }

        public function registerUser(){
            //kollar att alla input fält är ifyllda
            if(!$this->inputIsValid()){
                header("location: ../index.php?error=emptyinput"); 
                exit();
            }

            //kollar att alias är korrekt
            if(!$this->aliasIsValid()){
                header("location: ../index.php?error=invalidusername"); 
                exit();
            }

            //kollar att email adressen är korrekt
            if(!$this->emailIsValid()){
                header("location: ../index.php?error=invalidemail"); 
                exit();
            }

            //kollar att lösenorden är likadana
            /* if(!$this->pwdsDoMatch()){
                header("location: ../index.php?error=thepasswordsdonotmatch"); 
                exit();
            } */

            //kollar att användarnamn inte existerar
            if(!$this->doesUserExist()){
                header("location: ../index.php?error=theuseralreadyexist"); 
                exit();
            }

            $this->setUser($this->alias, $this->pwd, $this->email); 

        }

        private function inputIsValid(){
            return !empty($this->alias) && !empty($this->email) && !empty($this->pwd) && !empty($this->pwdRepeat);
        }

        private function aliasIsValid(){
            return preg_match("/^[a-zA-ZåäöÅÄÖ0-9]*$/", $this->alias);
        }

        private function emailIsValid(){
            return !filter_var($this_email, FILTER_VALIDATE_EMAIL);
        }

        private function pwdsDoMatch(){
            return $this->pwd != $this->pwdRepeat;
        }

        private function doesUserExist(){
            return $this->userExist($this->alias, $this->email);     
        }


        
    }