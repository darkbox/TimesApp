<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns" style="padding: 20px;">
		<h2><?php echo $name; ?></h2>
		
		<h4>
		An Internal Error Has Occurred. Our minions are working hard to fix it.
		</h4>
		<center>
		<?php echo $this->Html->image('minions_500.jpg', array('style' => 'width: 30%; margin-top: 25px')); ?>
		</center>
		<!-- <p class="error">
			<strong><?php //echo __d('cake', 'Error'); ?>: </strong>
			<?php //echo __d('cake', 'An Internal Error Has Occurred.'); ?>
		</p>-->
		<?php
		if (Configure::read('debug') > 0):
			echo $this->element('exception_stack_trace');
		endif;
		?>
		</div>
	</div>
</div>
