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
		Looks like our minions have lost that page, they'll be punished because of you. Thanks!
		</h4>
		<?php echo $this->Html->image('minions_404.jpg', array('style' => 'width: 100%')); ?>
		<!-- <p class="error">
			<strong><?php //echo __d('cake', 'Error'); ?>: </strong>
			<?php /*printf(
				__d('cake', 'The requested address %s was not found on this server.'),
				"<strong>'{$url}'</strong>"
			);*/ ?>
		</p>-->
		<?php
		if (Configure::read('debug') > 0):
			echo $this->element('exception_stack_trace');
		endif;
		?>
		</div>
	</div>
</div>
