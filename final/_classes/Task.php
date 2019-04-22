<?php
  class Task {
		private $task_id = null;
  	    private $description = null;
		private $due_date = null;
		private $urgency_id = null;
		private $urgency = null;
		private $importance_id = null;
		private $importance = null;
		private $user_id = null;
		private $name = null;
		private $password = null;
		private $status_id = null;
		private $task_status = null;
		
		private $urgencyObject = null;
		private $importanceObject = null;
		private $userObject = null;
		private $statusObject = null;
		
		public function __construct() {
			$urgencyObject = new Urgency();
			$urgencyObject->setID($this->urgency_id);
			$urgencyObject->setUrgency($this->urgency);
			$this->urgencyObject = $urgencyObject;
			
			$importanceObject = new Importance();
			$importanceObject->setID($this->importance_id);
			$importanceObject->setImportance($this->importance);
			$this->importanceObject = $importanceObject;
		
			$userObject = new User();
			$userObject->setID($this->user_id);
			$userObject->setName($this->name);
			$userObject->setPassword($this->password);
			$this->userObject = $userObject;
			
			$statusObject = new Status();
			$statusObject->setID($this->status_id);
			$statusObject->setStatus($this->task_status);
			$this->statusObject = $statusObject;
			
        }
        
        public function getUrgency() {
            return $this->urgencyObject;
        }
        
        public function getStatus() {
            return $this->statusObject;
        }
        
        public function getImportance() {
            return $this->importanceObject;
        }
        
        public function getUser() {
            return $this->userObject;
        }
        
		public function getID() {
			return $this->task_id;
		}
    
        public function getDescription() {
            return ucwords($this->description);
        }
        
        public function getDueDate() {
            return $this->due_date;
        }
  }
?>
