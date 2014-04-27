<?php if(count($projects)==0): ?>
	<option value=""><?php echo "There are no projects for this client"; ?></option>
<?php else: ?>
	<option value=""><?php echo "Select a project"; ?></option>
<?php endif; ?>

<?php foreach($projects as $project): ?>
	<option value="<?php echo $project['Project']['id']; ?>"><?php echo $project['Project']['code']; ?></option>
<?php endforeach; ?>
