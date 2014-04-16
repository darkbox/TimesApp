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
			<style type="text/css">
.timer-paused span{
   -ms-animation-play-state:paused;
   -o-animation-play-state:paused;
   -moz-animation-play-state:paused;
   -webkit-animation-play-state:paused;
  animation-play-state: paused;
}


.timer-group {
  height: 400px;
  margin: 0 auto;
  position: relative;
  width: 400px;
}

.timer {
  border-radius: 50%;
  height: 100px;
  overflow: hidden;
  position: absolute;
  width: 100px;
}

.timer:after {
  background: white;
  border-radius: 50%;
  content: "";
  display: block;
  height: 80px;
  left: 10px;
  position: absolute;
  width: 80px;
  top: 10px;
}

.timer .hand {
  float: left;
  height: 100%;
  overflow: hidden;
  position: relative;
  width: 50%;
}

.timer .hand span {
  border: 50px solid #9FBB58;
  border-bottom-color: transparent;
  border-left-color: transparent;
  border-radius: 50%;
  display: block;
  height: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform: rotate(225deg);
  width: 0;
}

.timer .hand:first-child {
  transform: rotate(180deg);
}

.timer .hand span {
  animation-duration: 4s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

.timer .hand:first-child span {
  animation-name: spin1;
}

.timer .hand:last-child span {
  animation-name: spin2; 
}

.timer.hour {
  background: #EDECE4;
  height: 400px;
  left: 0;
  width: 400px;
  top: 0;
}

.timer.hour .hand span {
  animation-duration: 3600s;
  border-top-color: #9FBB58;;
  border-right-color: #9FBB58;;
  border-width: 200px;
}

.timer.hour:after {
  height: 360px;
  left: 20px;
  width: 360px;
  top: 20px;
}

.timer.minute {
  background: #EDECE4;
  height: 350px;
  left: 25px;
  width: 350px;
  top: 25px;
}

.timer.minute .hand span {
  animation-duration: 60s;
  border-top-color: #E25440;
  border-right-color: #E25440;
  border-width: 175px;
}

.timer.minute:after {
  height: 310px;
  left: 20px;
  width: 310px;
  top: 20px;
}

.timer.second {
  background: white;
  height: 300px;
  left: 50px;
  width: 300px;
  top: 50px;
}

.timer.second .hand span {
  animation-duration: 1s;
  border-top-color: #4A4A4A;
  border-right-color: #4A4A4A;
  border-width: 150px;
}

.timer.second:after {
  height: 296px;
  left: 2px;
  width: 296px;
  top: 2px;
}

.face {
  background: #EDECE4;
  border-radius: 50%;
  height: 296px;
  left: 52px;
  padding: 165px 40px 0;
  position: absolute;
  width: 296px;
  text-align: center;
  top: 52px;
}

.face h2 {
  font-weight: 300; 
}

.face p {
  border-radius: 20px;
  font-size: 64px;
  font-weight: 400;
  position: absolute;
  top: 67px;
  width: 260px;
  left: 20px;
}

@keyframes spin1 {
  0% {
    transform: rotate(225deg);
  }
  50% {
    transform: rotate(225deg);
  }
  100% {
    transform: rotate(405deg);
  }
}

@keyframes spin2 {
  0% {
    transform: rotate(225deg);
  }
  50% {
    transform: rotate(405deg);
  }
  100% {
    transform: rotate(405deg);
  }
}
			</style>
			<script type="text/javascript">
$(document).ready(function(){
	var defaults = {}
  , one_second = 1000
  , one_minute = one_second * 60
  , one_hour = one_minute * 60
  , one_day = one_hour * 24
  , startDate = new Date()
  , lastPause = -1
  , face = $('#lazy')
  , show_status = $('#status')
  , status = 0;

var requestAnimationFrame = (function() {
  return window.requestAnimationFrame       || 
         window.webkitRequestAnimationFrame || 
         window.mozRequestAnimationFrame    || 
         window.oRequestAnimationFrame      || 
         window.msRequestAnimationFrame     || 
         function( callback ){
           window.setTimeout(callback, 1000 / 60);
         };
}());

bindTimer();

function bindTimer() {
  $('#btn_timer_reset').click(function(){
    startDate = new Date();
    status = 0;
    $('#btn_timer_playStop').text(' Run ');
    $('div#stop').each(function(){
        $(this).removeClass("hand");
      });
    show_status.text('Paused');
    face.text('00:00:00');
  });

  $('#btn_timer_playStop').click(function(){
    if(status == 0){
      status = 1;
      $('#btn_timer_playStop').text('Pause');
      $('div#stop').each(function(){
        $(this).addClass("hand");
        $(this).removeClass("timer-paused");
      });
      show_status.text('Running');
      tick();
    }else{
      status = 0;
      lastPause = new Date();
       $('#btn_timer_playStop').text(' Run ');
       $('div#stop').each(function(){
        $(this).addClass("timer-paused");
      });
      show_status.text('Paused');
    }
  });

  $('#btn_timer_submit').click(function(){
    
  });
}

function tick() {
  var now = new Date();
 
  var elapsed = now - startDate
  , parts = [];


  parts[0] = '' + Math.floor( elapsed / one_hour );
  parts[1] = '' + Math.floor( (elapsed % one_hour) / one_minute );
  parts[2] = '' + Math.floor( ( (elapsed % one_hour) % one_minute ) / one_second );

  parts[0] = (parts[0].length == 1) ? '0' + parts[0] : parts[0];
  parts[1] = (parts[1].length == 1) ? '0' + parts[1] : parts[1];
  parts[2] = (parts[2].length == 1) ? '0' + parts[2] : parts[2];

  face.text(parts.join(':'));

  if(status != 0){
    requestAnimationFrame(tick);
  }
  
}
});
			
			</script>
			<div class="row">
				<div class="medium-12 columns">
					<center>
						<section class="timer-group">
						  <div class="timer hour">
						    <div id="stop" class="timer-paused"><span></span></div>
						    <div id="stop" class="timer-paused"><span></span></div>
						  </div>
						  <div class="timer minute">
						    <div id="stop" class="timer-paused"><span></span></div>
						    <div id="stop" class="timer-paused"><span></span></div>
						  </div>
						  <div class="timer second">
						    <div id="stop" class="timer-paused"><span></span></div>
						    <div id="stop" class="timer-paused"><span></span></div>
						  </div>
						  <div class="face">
						    <h2 id="status">Paused</h2>
						    <p id="lazy">00:00:00</p>  
						  </div>
						</section>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="small-12 large-centered columns">
					<form id="addTimerForm" action="<?php echo Router::url(array('controller' => 'hour', 'action' => 'add')) ?>" method="post" data-abide>
            <div class="row">
              <div style="width: 315px; margin: 0 auto;">
                  <ul class="button-group radius" style="margin-top: 30px;"> 
                    <li style="width: 105px"><a href="#" id="btn_timer_reset" class="button alert">Reset</a></li>
                    <li style="width: 105px"><a href="#" id="btn_timer_playStop" class="button success"> Run </a></li>
                    <li style="width: 105px"><a href="#" id="btn_timer_submit" class="button success">Submit</a></li>
                  </ul>
              </div>
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