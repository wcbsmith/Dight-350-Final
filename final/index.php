<?php
	$page_title = "Full ToDo List";
	
	spl_autoload_register(function ($class) { include_once "./_classes/{$class}.php"; });

	include './structure/header.php';
?>
	<main>
		<?php
			try {
                echo '<h1>Welcome! Time to Get Busy</h1>';
        ?>
		<table border='1'>
			<tr>
				<th>ToDo</th>
				<th>User</th>
				<th>Importance</th>
				<th>Urgency</th>
				<th>Status</th>
			</tr>
        <?php foreach(TaskCollection::all() as $task) { ?>
            <tr>
                <td><a href="./task/details.php?id=<?=$task->getID()?>"><?=$task->getDescription();?></a></td> 
				<td><?=ucwords($task->getUser()->getName());?></td>
				<td><?=$task->getImportance()->getImportance();?></td>
                <td><?=$task->getUrgency()->getUrgency();?></td>
                <td><?=ucwords($task->getStatus()->getStatus());?></td>
            </tr>   
		<?php }  
			} catch (Exception $exception) {
				echo '<p class="exception">Exception: '.$exception->getMessage().'</p>';
			}
		?>
		</table>
	</main>
<?php
	include './structure/footer.php';
?>
