<nav class="page-nav">
	<ul>
		<?php foreach($sideBar['links'] as $key => $link): ?>
			<?php 
			if($sideBar['active']['controller'] == $link['controller'] && $sideBar['active']['action'] == $link['action'])
				$class = 'class="current"'; 
			else
				$class = '';
			?>
			<li <?php echo $class; ?>><?php echo $this->Html->link($sideBar['titles'][$key], $link); ?></li>
		<?php endforeach; ?>
	</ul>
</nav>