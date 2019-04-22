<?php
  class User {
    private $user_id = null;
      private $name = null;
      private $password = null;    
    // #rudimentary signin feature
    // public function verifyPassword() {
        
    // }
    
    public function setName($name) {
      $this->name = $name;
    }
    
    public function setID($user_id) {
      $this->user_id = $user_id;
    }
    
    public function setPassword($password) {
      $this->password = $password;
    }
    
  	public function getName() {
  		return $this->name;
  	}
  	
    public function getID() {
      return $this->user_id;
    }
  
  
  }
?>
