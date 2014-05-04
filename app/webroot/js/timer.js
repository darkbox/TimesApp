//plugin stopwatch
(function( $ ){

    function incrementer(ct, increment) {
        return function() { ct+=increment; return ct; };
    }
    
    function pad2(number) {
         return (number < 10 ? '0' : '') + number;
    }

    function defaultFormatMilliseconds(millis) {
        var x, seconds, minutes, hours;
        x = millis / 1000;
        seconds = Math.floor(x % 60);
        x /= 60;
        minutes = Math.floor(x % 60);
        x /= 60;
        hours = Math.floor(x % 24);
        // x /= 24;
        // days = Math.floor(x);
        return [pad2(hours), pad2(minutes), pad2(seconds)].join(':');
    }

    //NOTE: This is a the 'lazy func def' pattern described at http://michaux.ca/articles/lazy-function-definition-pattern
    function formatMilliseconds(millis, data) {
        // Use jintervals if available, else default formatter
        var formatter;
        if (typeof jintervals == 'function') {
            formatter = function(millis, data){return jintervals(millis/1000, data.format);};
        } else {
            formatter = defaultFormatMilliseconds;
        }
        formatMilliseconds = function(millis, data) {
            return formatter(millis, data);
        };
        return formatMilliseconds(millis, data);
    }

    var methods = {
        
        init: function(options) {
            var defaults = {
                updateInterval: 1000,
                startTime: 0,
                format: '{HH}:{MM}:{SS}',
                formatter: formatMilliseconds
            };
            
            // if (options) { $.extend(settings, options); }
            
            return this.each(function() {
                var $this = $(this),
                    data = $this.data('stopwatch');
                
                // If the plugin hasn't been initialized yet
                if (!data) {
                    // Setup the stopwatch data
                    var settings = $.extend({}, defaults, options);
                    data = settings;
                    data.active = false;
                    data.target = $this;
                    data.elapsed = settings.startTime;
                    // create counter
                    data.incrementer = incrementer(data.startTime, data.updateInterval);
                    data.tick_function = function() {
                        var millis = data.incrementer();
                        data.elapsed = millis;
                        data.target.trigger('tick.stopwatch', [millis]);
                        data.target.stopwatch('render');
                    };
                    $this.data('stopwatch', data);
                }
                
            });
        },
        
        start: function() {
            return this.each(function() {
                var $this = $(this),
                    data = $this.data('stopwatch');
                // Mark as active
                data.active = true;
                data.timerID = setInterval(data.tick_function, data.updateInterval);
                $this.data('stopwatch', data);
            });
        },
        
        stop: function() {
            return this.each(function() {
                var $this = $(this),
                    data = $this.data('stopwatch');
                clearInterval(data.timerID);
                data.active = false;
                $this.data('stopwatch', data);
            });
        },
        
        destroy: function() {
            return this.each(function(){
                var $this = $(this),
                    data = $this.data('stopwatch');
                $this.stopwatch('stop').unbind('.stopwatch').removeData('stopwatch');
            });
        },
        
        render: function() {
            var $this = $(this),
                data = $this.data('stopwatch');
            $this.html(data.formatter(data.elapsed, data));
        },

        getFormatedTime: function() {
            var $this = $(this),
                data = $this.data('stopwatch');
            return data.formatter(data.elapsed, data);          
        },

        getTime: function() {
            var $this = $(this),
                data = $this.data('stopwatch');
            return data.elapsed;
        },

        isRunning: function() {
            var $this = $(this);
                var data = $this.data('stopwatch');
                return data.active;
        },
        
        toggle: function() {
            return this.each(function() {
                var $this = $(this);
                var data = $this.data('stopwatch');
                if (data.active) {
                    $this.stopwatch('stop');
                } else {
                    $this.stopwatch('start');
                }
            });
        },
        
        reset: function() {
            return this.each(function() {
                var $this = $(this);
                    data = $this.data('stopwatch');
                data.incrementer = incrementer(data.startTime, data.updateInterval);
                data.elapsed = data.startTime;
                $this.data('stopwatch', data);
            });
        }
    };
    
    
    // Define the function
    $.fn.stopwatch = function( method ) {
        if (methods[method]) {
            return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.stopwatch' );
        }
    };

})( jQuery );

// Canvas code
$(document).ready(function(){
  var canvas , ctx
  , pHours = 0, pMinutes = 0, pSeconds = 0, pMilli = 0
  , statusText = "Paused", timeText = "00:00:00"
  , toggle = false, tp;

init();
var lastRender = Date.now();

function init(){
  tp = $('#timer-plugin').stopwatch();
  tp.stopwatch('stop');

  //bind
  $('#btn_timer_reset').click(function(e){
    e.preventDefault();

    tp.stopwatch('reset');

    if(!toggle){
      statusText = "Paused";
    }
    timeText = "00:00:00";

  });
  $('#btn_timer_playStop').click(function(e){
    e.preventDefault();

    tp.stopwatch('toggle');

    $(window).bind('beforeunload', function(){
      return 'Save data before leaving or you may lose it';
    });


    if(!toggle){
      toggle = true;
      $('#btn_timer_playStop').text('Pause');
      statusText = "Running";      
    }else{
      toggle = false;
      $('#btn_timer_playStop').text('Run');
      statusText = "Paused";
    }

  });

  $('#btn_timer_submit').click(function(e){
    e.preventDefault();

    var parts = timeText.split(':');
    var totalHours = 0;

    totalHours = (((parseInt(parts[0]) * 3600) + parseInt(parts[1])) * 60) + parseInt(parts[2]);
    totalHours *= 0.00027777777777777778;

    $('#hidden_hours').val(totalHours);

    // validación
    if(totalHours <= 0.01666){
      $( "#timeError" ).toggle("fast", function(){});
    }else{
      $(window).unbind('beforeunload');
      $('#addTimerForm').submit();
    }
    
  });

  //canvas
  canvas = document.getElementById('canvas-timer');
  ctx = canvas.getContext('2d');
  ctx.webkitImageSmoothingEnabled = true;

  run(ctx); //run

}

function run(){
  var delta = Date.now() - lastRender;
  update(delta);
  paint();
  requestAnimationFrame(run);
}

function update(delta){
  timeText = tp.stopwatch('getFormatedTime');

  if(tp.stopwatch('isRunning')){
    if(pMilli >= 60){
      pMilli = 0;
    }else{
      pMilli++;
    }
  }
    
  // calcula el porcentaje
  var parts = timeText.split(':');
  pHours = (parts[1] * 100)/60;
  pMinutes = (parts[2] * 100)/60;
  //pSeconds = (pMilli * 100)/60;
  pSeconds = 0;
}

function paint(){
  // clear
  ctx.clearRect(0, 0, canvas.width, canvas.height);

    // hours
    drawArc(100, canvas.width/2, canvas.height/2, 185, 15, '#EDECE4', ctx);
    drawArc(pHours, canvas.width/2, canvas.height/2, 185, 15, '#9FBB58', ctx);

    // minutes
    drawArc(100, canvas.width/2, canvas.height/2, 165, 15, '#EDECE4', ctx);
    drawArc(pMinutes, canvas.width/2, canvas.height/2, 165, 15, '#E25440', ctx);

    // seconds
    ctx.beginPath();
  ctx.arc(canvas.width/2, canvas.height/2, 150, 0, Math.PI*2, true); 
  ctx.closePath();
  ctx.fillStyle = '#EDECE4';
  ctx.fill();
    drawArc(pSeconds, canvas.width/2, canvas.height/2, 150, 5, '#4A4A4A', ctx);

    // small numbers
    ctx.font = '46pt Open Sans';
    ctx.textAlign = 'center';
  ctx.fillStyle = '#3C4043';
  ctx.textBaseline = 'top';
    ctx.fillText(timeText, 200, 150);
    ctx.font = '300 2.3125rem Open Sans';
    ctx.fillText(statusText, 200, 230);
}

function drawArc(p, x, y, radius, linewidth, color, ctx){
    this.p = p;
    this.x = x;
    this.y = y;
    this.radius = radius;
    this.ctx = ctx;
    this.startAngle = 1.5 * Math.PI;
    //this.endAngle = 3.5 * Math.PI;
    /* calc p
    100% = 3.5 
    0%  = x */
    this.endAngle = (((this.p*2)/100)+1.5) * Math.PI;
    this.ctx.beginPath();
    this.ctx.arc(this.x, this.y, this.radius, startAngle, endAngle, false);
    this.ctx.lineWidth = linewidth;
      // line color
    this.ctx.strokeStyle = color;
    this.ctx.stroke();
}

});