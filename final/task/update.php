<?php
	spl_autoload_register(function ($class) {
		include_once "../_classes/{$class}.php";
    });
    
    $importance_levels = ImportanceCollection::all();
	$urgency_levels = UrgencyCollection::all();
    $users = UserCollection::all();
    $status_levels = StatusCollection::all();
	
	if (empty($_GET['id'])) {
		header('Location: ../index.php');
	}

	# 1 - Eliminate whitespace
	# 2 - Sanitize to proper data types
	$task_id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

	$task = TaskCollection::single($task_id);
	
	if (!empty($_POST)) {
		# 1 - Eliminate whitespace
		$task_id = trim(filter_input(INPUT_POST, "task_id", FILTER_SANITIZE_NUMBER_INT));
        $description = trim(filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING));
        // $due_date = trim(filter_input(INPUT_POST, "due_date", FILTER_SANITIZE_STRING ));
        // $importance_id = ($_POST["importance_id"]) ? trim(filter_input(INPUT_POST, "importance_id", FILTER_SANITIZE_NUMBER_INT)) : null;
        //TODO: Fix so that we can convert from user data to mysql data
        $due_date = $task->getDueDate();
		$urgency_Id = ($_POST["urgency_id"]) ? trim(filter_input(INPUT_POST, "urgency_id", FILTER_SANITIZE_NUMBER_INT)) : null;
        $user_id = ($_POST["user_id"]) ? trim(filter_input(INPUT_POST, "user_id", FILTER_SANITIZE_NUMBER_INT)) : null;
        $status_id = ($_POST["status_id"]) ? trim(filter_input(INPUT_POST, "status_id", FILTER_SANITIZE_NUMBER_INT)) : null;

		$updated_task = TaskCollection::update($task_id, $decription, $due_date, $importance_id, $urgency_id, $user_id, $status_id);

		if ($updated_task) {
			header("Location: ./index.php");
		}
	}
?>

<ul>
  <li><a href="../index.php">Full ToDo List</a></li>
  <li><a href="./task-urgency-levels/index.php">Task Urgency Levels</a></li>
  <li><a href="./users/index.php">Registered Users</a></li>
  <li><a href="./task-importance-levels/index.php">Task Importance Levels</a></li>
</ul>

<h2>Update a Task</h2>
<form method="post">
	<input id="task_id" name="task_id" type="hidden" value="<?=$task->getID();?>" />
	
	<p>
		<label for="description">Description:</label>
		<input id="description" name="description" type="text" value="<?=$task->getDescription();?>" required />
    </p>
    
    <!-- <p>
		<label for="due_date">Due Date:</label>
        <input id="due_date" name="due_date" type="date" value="<?=$task->getDueDate();?>
        " required />
	</p> -->

    <?php if(count($importance_levels) > 0) { ?>
	<p>
		<label for="importance_id">Importance Levels</label>
		<select id="importance_id" name="importance_id">
			<option value="">-- Select One --</option>
			<?php 
				foreach($importance_levels as $level) { 
					$selected = ($task->getImportance()->getID() === $level->getID()) ? " selected" : "";	
			?>
				<option value="<?=$level->getID();?>"<?=$selected;?>><?=$level->getImportance();?></option>
			<?php } ?>
		</select>
	</p>
	<?php } else { ?>
		<p>No available <a href="./schools-of-magic/add.php">Importance Levels</a></p>
	<?php } ?>

    <?php if(count($urgency_levels) > 0) { ?>
	<p>
		<label for="urgency_id">Urgency Levels</label>
		<select id="urgency_id" name="urgency_id">
			<option value="">-- Select One --</option>
			<?php 
				foreach($urgency_levels as $level) { 
					$selected = ($task->getUrgency()->getID() === $level->getID()) ? " selected" : "";	
			?>
				<option value="<?=$level->getID();?>"<?=$selected;?>><?=$level->getUrgency();?></option>
			<?php } ?>
		</select>
	</p>
	<?php } else { ?>
		<p>No available <a href="./schools-of-magic/add.php">Urgency Levels</a></p>
	<?php } ?>

    <?php if(count($users) > 0) { ?>
	<p>
		<label for="user_id">Registered Users</label>
		<select id="user_id" name="user_id">
			<option value="">-- Select One --</option>
			<?php 
				foreach($users as $user) { 
					$selected = ($task->getUser()->getID() === $user->getID()) ? " selected" : "";	
			?>
				<option value="<?=$user->getID();?>"<?=$selected;?>><?=ucwords($user->getName());?></option>
			<?php } ?>
		</select>
	</p>
	<?php } else { ?>
		<p>No available <a href="./schools-of-magic/add.php">Registered Users</a></p>
	<?php } ?>

    <?php if(count($status_levels) > 0) { ?>
	<p>
		<label for="status_id">Status Levels</label>
		<select id="status_id" name="status_id">
			<option value="">-- Select One --</option>
			<?php 
				foreach($status_levels as $level) { 
					$selected = ($task->getStatus()->getID() === $level->getID()) ? " selected" : "";	
			?>
				<option value="<?=$level->getID();?>"<?=$selected;?>><?=ucwords($level->getStatus());?></option>
			<?php } ?>
		</select>
	</p>
	<?php } else { ?>
		<p>No available <a href="./schools-of-magic/add.php">Urgency Levels</a></p>
	<?php } ?>
	<p>
		<button>Update</button>
	</p>
</form>