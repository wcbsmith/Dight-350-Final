<?php
  class Status {
		private $status_id = null;
		private $task_status = null;
		
		public function setID($status_id) {
            $this->status_id = $status_id;
        }
        
        public function setStatus($task_status) {
            $this->task_status = $task_status;
        }
        
		public function getID() {
			return $this->status_id;
		}
	  
        public function getStatus() {
            return $this->task_status;
        }
  }
?>
