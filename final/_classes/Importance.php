<?php
  class Importance {
    private $importance_id = null;
  	private $importance = null;
      
    public function setImportance($importance) {
      $this->importance = $importance;
    }
    
    public function setID($id) {
      $this->importance_id = $importance_id;
    }
      
  	public function getImportance() {
  		return $this->importance;
  	}
  	
    public function getID() {
      return $this->importance_id;
    }
  }
?>
