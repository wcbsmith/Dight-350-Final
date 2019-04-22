<?php
  class ImportanceCollection {
  	public static function all() {
  		$query = "
				SELECT id, importance
					FROM task_importance_levels
				ORDER BY importance ASC
			";
  		
  		try {
				$pdo = DatabaseConnection::getConnection();

				$results = $pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'Importance');
				
				return $results;
			} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
	}
	  
	public static function single($id) {
		$query = "
			  SELECT id, importance
				  FROM task_importance_levels
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
		
		$statement->setFetchMode(PDO::FETCH_CLASS, 'Importance');
		
		return $statement->fetch();
	}
  	
  	public static function add($importance) {
  		$query = "
  			INSERT INTO task_importance_levels (importance)
  			     VALUES (:importance)
  		";
  		
  		try {
  			$pdo = DatabaseConnection::getConnection();
  			
  			$statement = $pdo->prepare($query);
  			
  			$statement->bindParam(':importance', $importance);
              
  			$statement->execute();
  		} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
			
			return $statement;
	}
	  
	public static function update($id, $importance) {
		$query = "
			UPDATE task_importance_levels
				SET importance = :importance
			WHERE id = :id
			LIMIT 1
		";
		
		try {
			$pdo = DatabaseConnection::getConnection();
			
			$statement = $pdo->prepare($query);
			
			$statement->bindParam(':id', $id);
			$statement->bindParam(':importance', $importance);
            
			$statement->execute();
		} catch (PDOException $exception) {
			  exit($exception->getMessage());
		  }
		  
		  $pdo = null;
		  
		  return $statement;
	}
  }
?>
