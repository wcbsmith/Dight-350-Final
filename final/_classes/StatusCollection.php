<?php
  class StatusCollection {
  	public static function all() {
  		$query = "
				SELECT id AS status_id, status as task_status
					FROM task_status_options
				ORDER BY id ASC
			";
  		
  		try {
				$pdo = DatabaseConnection::getConnection();

				$results = $pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'Status');
				
				return $results;
			} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
	}
	  
	public static function single($id) {
		$query = "
			  SELECT id AS status_id, status as task_status
				  FROM task_status_options
			  Where id=:id
			  LIMIT 1
		  ";
		
		try {
			$pdo = DatabaseConnection::getConnection();

			$statement = $pdo->prepare($query);
			
			$statement->bindParam(':id', $id);
			
			$statement->execute();
			
		} catch (PDOException $exception) {
			exit($exception->getMessage());
		}
		  
		$pdo = null;
		
		$statement->setFetchMode(PDO::FETCH_CLASS, 'Status');
		
		return $statement->fetch();
	}
  	
  	public static function add($status) {
  		$query = "
  			INSERT INTO task_status_options (status, password)
  			     VALUES (:status)
  		";
  		
  		try {
  			$pdo = DatabaseConnection::getConnection();
  			
  			$statement = $pdo->prepare($query);
  			
  			$statement->bindParam(':status', $status);
              
  			$statement->execute();
  		} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
			
			return $statement;
	}
	  
	public static function update($id, $status) {
		$query = "
			UPDATE task_status_options
				SET status = :status
			WHERE id = :id
			LIMIT 1
		";
		
		try {
			$pdo = DatabaseConnection::getConnection();
			
			$statement = $pdo->prepare($query);
			
			$statement->bindParam(':id', $id);
			$statement->bindParam(':status', $status);
            
			$statement->execute();
		} catch (PDOException $exception) {
			  exit($exception->getMessage());
		  }
		  
		  $pdo = null;
		  
		  return $statement;
	}
  }
?>
