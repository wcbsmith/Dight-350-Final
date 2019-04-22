<?php
	spl_autoload_register(function ($class) {
		include_once "../_classes/{$class}.php";
	});

	# 1 - Eliminate whitespace
	# 2 - Sanitize to proper data types
	$task_id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    // $task = new Task();
    $task = TaskCollection::single($task_id);

?>

<ul>
  <li><a href="../index.php">Full ToDo List</a></li>
  <li><a href="./task-urgency-levels/index.php">Task Urgency Levels</a></li>
  <li><a href="./users/index.php">Registered Users</a></li>
  <li><a href="./task-importance-levels/index.php">Task Importance Levels</a></li>
</ul>

<h2>Task Details</h2>

<p><a href="./update.php?id=<?=$task->getID();?>">Edit this Task</a></p>
<p><a href="./delete.php?id=<?=$task->getID();?>">Remove</a></p>

<p><?=ucwords($task->getDescription());?></p>

<h3>Due</h3>
  <p><?=$task->getDueDate()?></p>

<h3>This task is:</h3>
    <p><?=$task->getImportance()->getImportance()." and ".$task->getUrgency()->getUrgency()?></p>
