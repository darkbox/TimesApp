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
  , face = $('#lazy');

// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
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

tick();

function tick() {
  var now = new Date()
    , elapsed = now - startDate
    , parts = [];

  parts[0] = '' + Math.floor( elapsed / one_hour );
  parts[1] = '' + Math.floor( (elapsed % one_hour) / one_minute );
  parts[2] = '' + Math.floor( ( (elapsed % one_hour) % one_minute ) / one_second );

  parts[0] = (parts[0].length == 1) ? '0' + parts[0] : parts[0];
  parts[1] = (parts[1].length == 1) ? '0' + parts[1] : parts[1];
  parts[2] = (parts[2].length == 1) ? '0' + parts[2] : parts[2];

  face.text(parts.join(':'));
  
  requestAnimationFrame(tick);
  
}
});
			
			</script>
			<div class="row">
				<div class="medium-12 columns">
					<center>
						<section class="timer-group">
						  <div class="timer hour">
						    <div class="hand"><span></span></div>
						    <div class="hand"><span></span></div>
						  </div>
						  <div class="timer minute">
						    <div class="hand"><span></span></div>
						    <div class="hand"><span></span></div>
						  </div>
						  <div class="timer second">
						    <div class="hand"><span></span></div>
						    <div class="hand"><span></span></div>
						  </div>
						  <div class="face">
						    <h2>Running</h2>
						    <p id="lazy">00:00:00</p>  
						  </div>
						</section>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="small-6 large-centered columns">
					<form>
						<div>
							<label><?php echo __('Project'); ?>
							<input type="text" name="">
							</label>
						</div>
						<div>
							<label><?php echo __('Note'); ?>
							<input type="text" name="">
							</label>
						</div>
					</form>
					<ul class="button-group radius" style="margin-top: 30px; margin-left: 22px;"> 
						<li><a href="#" id="timer_pause" class="button alert">Reset</a></li>
						<li><a href="#" id="timer_playStop" class="button success">Pause</a></li>
						<li><a href="#" id="timer_submit" class="button success">Submit</a></li>
					</ul>
				</div>
			</div>

			</div>
			</div>
		</div>
	</div>
</div>