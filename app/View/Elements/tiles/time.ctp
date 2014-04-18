<script type="text/javascript">
	$(document).ready(updateTime);

	function updateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        if (minutes < 10){
            minutes = "0" + minutes;
        }
        if (seconds < 10){
            seconds = "0" + seconds;
        }
        var v = hours + ":" + minutes + " ";
        if(hours > 11){
            v+="<small>pm</small>";
        } else {
            v+="<small>am</small>"
        }
        setTimeout("updateTime()",1000);
        document.getElementById('time').innerHTML=v;
    }
</script>

<style type="text/css">
	.dash-tile{
		color: #bfbfb5;
		padding: 20px;
		min-height: 240px;

		box-sizing: border-box;
		position: relative;
		max-width: 1100px;
		margin: 10px auto 0 auto;
		background: none repeat scroll 0% 0% #FFF;
		box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.05);
	}

	.dash-tile h1, h2, h3, h4, small{
		color: #47494b;
		font-weight: 300;
	}
	
	.dash-tile footer{
		width: 100%;
		position: absolute;
		bottom: 0;
		left: 0;
		height: 30px;
		border-top: 1px solid #f2f2f0;
		text-transform: uppercase;
	}

	.dash-tile footer ul{
		list-style: none;
		display: block;
	
	}

	.dash-tile footer ul li{
		display: inline-block;
	}

	.dash-tile footer ul .btn {
		position: absolute;
		right: 0;
		width: 35px;
		height: 30px;
		border-left: 1px solid #f2f2f0;
	}

	.dash-tile footer ul .btn a{
		color: #bfbfb5;
		font-size: 15px;
		padding-left: 9px;
		line-height: 30px;
	}

	.dash-tile footer h1, h2, h3, h4, small{
		color: #bfbfb5;
		font-size: 16px;
		font-weight: 300;
		text-transform: uppercase;
	}

	#time{
		margin-top: 20px;
	}
</style>

<section class="dash-tile" id="time-tile">
	<span>Today</span>
	<h1 id="time"></h1>
	<span id="date"><?php echo date('l / F d / Y', time()); ?></span>
</section>