<?php
  class TaskCollection {
  	public static function all() {
  		$query = "
		  SELECT  task_summary.id as task_id, 
					task_summary.description, 
					task_summary.due_date,
					task_summary.urgency_id as urgency_id,
					task_urgency_levels.urgency as urgency,
					task_summary.importance_id as importance_id,
					task_importance_levels.importance as importance,
					task_summary.user_id as user_id,
					users.user as name,
					users.password as password,
					task_summary.status_id as status_id, 
					task_status_options.status as task_status 
					FROM task_summary
			JOIN users ON task_summary.user_id=users.id
			JOIN task_urgency_levels ON task_summary.urgency_id=task_urgency_levels.id
			JOIN task_importance_levels ON task_summary.importance_id=task_importance_levels.id
			JOIN task_status_options ON task_summary.status_id=task_status_options.id
			ORDER BY task_summary.id;
			";
  		
  		try {
				$pdo = DatabaseConnection::getConnection();

				$results = $pdo->query($query)->fetchAll(PDO::FETCH_CLASS, 'Task');
				
				return $results;
			} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
	}
	  
	public static function single($id) {
		$query = "
            SELECT  task_summary.id as task_id, 
                    task_summary.description, 
                    task_summary.due_date,
                    task_summary.urgency_id as urgency_id,
                    task_urgency_levels.urgency as urgency,
                    task_summary.importance_id as importance_id,
                    task_importance_levels.importance as importance,
                    task_summary.user_id as user_id,
                    users.user as name,
                    users.password as password,
                    task_summary.status_id as status_id, 
                    task_status_options.status as task_status 
                    FROM task_summary
                JOIN users ON task_summary.user_id=users.id
                JOIN task_urgency_levels ON task_summary.urgency_id=task_urgency_levels.id
                JOIN task_importance_levels ON task_summary.importance_id=task_importance_levels.id
                JOIN task_status_options ON task_summary.status_id=task_status_options.id
            WHERE task_summary.id=:id
            ORDER BY task_summary.id;
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
		
		$statement->setFetchMode(PDO::FETCH_CLASS, 'Task');
		
		return $statement->fetch();
	}
  	
  	public static function add($decription, $due_date, $importance_id, $urgency_id, $user_id, $status_id) {
  		$query = "
  			INSERT INTO task_summary (description, due_date, importance_id, urgency_id, user_id, status_id)
  			     VALUES (:description, :due_date, :importance_id, :urgency_id, :user_id, :status_id)
  		";
  		
  		try {
  			$pdo = DatabaseConnection::getConnection();
  			
  			$statement = $pdo->prepare($query);
  			
  			$statement->bindParam(':description', $description);
  			$statement->bindParam(':due_date', $due_date);
  			$statement->bindParam(':importance_id', $importance_id);
  			$statement->bindParam(':urgency_id', $urgency_id);
            $statement->bindParam(':user_id', $user_id);
            $statement->bindParam(':status_id', $status_id);
  			
  			$statement->execute();
  		} catch (PDOException $exception) {
				exit($exception->getMessage());
			}
			
			$pdo = null;
			
			return $statement;
	}
	  
	public static function update($id, $decription, $due_date, $importance_id, $urgency_id, $user_id, $status_id) {
		$query = "
			UPDATE task_summary
				SET description = :description,
					due_date = :due_date,
					importance_id = :importance_id,
					urgency_id = :urgency_id,
                    user_id = :user_id,
                    status_id = :status_id
			WHERE id = :id
			LIMIT 1
		";
		
		try {
			$pdo = DatabaseConnection::getConnection();
			
			$statement = $pdo->prepare($query);
            
            $statment->bindParam(':id', $id);
			$statement->bindParam(':description', $description);
  			$statement->bindParam(':due_date', $due_date);
  			$statement->bindParam(':importance_id', $importance_id);
  			$statement->bindParam(':urgency_id', $urgency_id);
            $statement->bindParam(':user_id', $user_id);
            $statement->bindParam(':status_id', $status_id);
			
			$statement->execute();
		} catch (PDOException $exception) {
			  exit($exception->getMessage());
		  }
		  
		  $pdo = null;
		  
		  return $statement;
    }
    // TODO:
    // create function to mark task as complete, so user can change status from incomplete to complete with one click.
    
    
  }
?>
