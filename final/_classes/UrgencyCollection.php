<?php
  class UrgencyCollection {
  	public static function all() {
  		$query = "
				SELECT id, urgency
					FROM task_urgency_levels
				ORDER BY urgency ASC
			";
  		
  		try {
				$pdo = DatabaseConnection::getConnection();

				$results = $pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'Urgency');
				
				return $results;
			} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
	}
	  
	public static function single($id) {
		$query = "
			  SELECT id, urgency
				  FROM task_urgency_levels
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
		
		$statement->setFetchMode(PDO::FETCH_CLASS, 'Urgency');
		
		return $statement->fetch();
	}
  	
  	public static function add($urgency) {
  		$query = "
  			INSERT INTO task_urgency_levels (urgency)
  			     VALUES (:urgency)
  		";
  		
  		try {
  			$pdo = DatabaseConnection::getConnection();
  			
  			$statement = $pdo->prepare($query);
  			
  			$statement->bindParam(':urgency', $urgency);
  			
  			$statement->execute();
  		} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
			
			return $statement;
	}
	  
	public static function update($id, $urgency) {
		$query = "
			UPDATE task_urgency_levels
				SET urgency = :urgency
			WHERE id = :id
			LIMIT 1
		";
		
		try {
			$pdo = DatabaseConnection::getConnection();
			
			$statement = $pdo->prepare($query);
			
			$statement->bindParam(':id', $id);
			$statement->bindParam(':urgency', $urgency);
			
			$statement->execute();
		} catch (PDOException $exception) {
			  exit($exception->getMessage());
		  }
		  
		  $pdo = null;
		  
		  return $statement;
	}
  }
?>
