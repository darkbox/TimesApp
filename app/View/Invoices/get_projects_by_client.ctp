<?php foreach($projects as $project): ?>
	<option value="<?php echo $project['Project']['id']; ?>"><?php echo $project['Project']['code']; ?></option>
<?php endforeach; ?>