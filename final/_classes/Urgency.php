<?php
  class Urgency {
    private $urgency_id = null;
  	private $urgency = null;
    
    public function setUrgency($urgency) {
      $this->urgency = $urgency;
    }
    
    public function setID($id) {
      $this->urgency_id = $urgency_id;
    }
      
  	public function getUrgency() {
  		return $this->urgency;
  	}
  	
	public function getID() {
		return $this->urgency_id;
	}
  }
?>
