<?php
  class UserCollection {
  	public static function all() {
  		$query = "
				SELECT id AS user_id, user AS name, password
					FROM users
				ORDER BY user ASC
			";
  		
  		try {
				$pdo = DatabaseConnection::getConnection();

				$results = $pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'User');
				
				return $results;
			} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
	}

	public static function single($id) {
		$query = "
			  SELECT id AS user_id, user AS name, password
				  FROM users
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
		
		$statement->setFetchMode(PDO::FETCH_CLASS, 'User');
		
		return $statement->fetch();
	}
  	
  	public static function add($user, $password) {
  		$query = "
  			INSERT INTO users (user, password)
  			     VALUES (:user, :password)
  		";
  		
  		try {
  			$pdo = DatabaseConnection::getConnection();
  			
  			$statement = $pdo->prepare($query);
  			
  			$statement->bindParam(':user', $user);
            $statement->bindParam(':password', $password);
              
  			$statement->execute();
  		} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
			
			return $statement;
	}
	  
	public static function update($id, $user, $password) {
		$query = "
			UPDATE users
                SET user = :user, 
                    password = :password
			WHERE id = :id
			LIMIT 1
		";
		
		try {
			$pdo = DatabaseConnection::getConnection();
			
			$statement = $pdo->prepare($query);
			
			$statement->bindParam(':id', $id);
			$statement->bindParam(':user', $user);
            $statement->bindParam(':password', $password);
            
			$statement->execute();
		} catch (PDOException $exception) {
			  exit($exception->getMessage());
		  }
		  
		  $pdo = null;
		  
		  return $statement;
	}
  }
?>
