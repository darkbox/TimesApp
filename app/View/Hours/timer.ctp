<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li><?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Add hours'), array('controller' => 'hours', 'action' => 'add')); ?></li>
				<li class="current"><a href=""><?php echo __('Timer') ?></a></li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Timer'); ?></h1>
			</header>
			<!-- Contenido -->
			<div class="row">
				<div class="medium-12 columns">
        <center>
					<canvas id="canvas-timer" width="400" height="400"></canvas>
          <div id="timer-plugin" style="display: none"></div>
        </center>
				</div>
			</div>
			<div class="row">
				<div class="small-12 large-centered columns">
					<form id="addTimerForm" action="<?php echo Router::url(array('controller' => 'hours', 'action' => 'add')) ?>" method="post" data-abide>
            <div class="row">
              <div style="width: 315px; margin: 0 auto;">
                  <ul class="button-group radius" style="margin-top: 30px;"> 
                    <li style="width: 105px"><a href="#" style="width: 100%" id="btn_timer_reset" class="button alert">Reset</a></li>
                    <li style="width: 105px"><a href="#" style="width: 100%" id="btn_timer_playStop" class="button success">Run</a></li>
                    <li style="width: 105px"><a href="#" style="width: 100%" id="btn_timer_submit" class="button success">Add</a></li>
                  </ul>
              </div>
            </div>
            <div class="row">
              <div class="medium-12 large-12 columns">
                <small id="timeError" class="error" style="display: block; display: none; width:100%">You can not add less than one minute.</small></div>
            </div>
            <div class="row">
						<div class="medium-4 large-4 columns">
              <label><?php echo __('Project'); ?> <small>required</small>
                <select name="data[Hour][project_id]" required>
                  <option value=""><?php echo __('Select a project') ?></option>
                  <?php foreach($projects as $key => $project): ?>
                  <option value="<?php echo $key ?>"><?php echo h($project) ?></option>
                  <?php endforeach; ?>
                </select>
              </label>
              <small class="error">A project is required.</small>
            </div>
            <div class="medium-4 large-4 columns">
              <label><?php echo __('Service'); ?> <small>required</small>
                <select name="data[Hour][service_id]" required>
                  <option value=""><?php echo __('Select a service') ?></option>
                  <?php foreach($services as $key => $service): ?>
                  <option value="<?php echo $key ?>"><?php echo h($service) ?></option>
                  <?php endforeach; ?>
                </select>
              </label>
              <small class="error">A service is required.</small>
            </div>
            <div class="medium-4 large-4 columns divToggle" style="width: auto !important; margin-top: 22px; margin-right: 15px;">
                <input type="checkbox" id="showBilled" name="data[Hour][billed]">
                <label class="firstLabel" for="showBilled"><i></i></label>
                <label class="toggleLabel" for="showBilled"><?php echo __('Billable to client'); ?></label>
              </div>
            </div>
            <div class="row">
              <label><?php echo __('Note'); ?> <small>required</small>
                <textarea name="data[Hour][note]" required></textarea>
              </label>
              <small class="error">A note is required.</small>
            </div>

            <input type="hidden" id="hidden_hours" name="data[Hour][hours]" value="0.00">
            <input type="hidden" id="hidden_user_id" name="data[Hour][user_id]" value="<?php echo $current_user['id'] ?>">
					</form>
				</div>
			</div>

			</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->script('timer'); ?>