<div class="page-wrapper">
	<div class="row">
		<div class="large-3 medium-3 columns">
			<nav class="page-nav">
				<ul>
				<li class="current"><a href=""><?php echo __('Invoices'); ?></a></li>
				<li><?php echo $this->Html->link(__('Payments'), array('controller' => 'payments', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Add Payment'), array('controller' => 'payments', 'action' => 'add')); ?> </li>
				</ul>
			</nav>
		</div>
		<div class="large-9 medium-9 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Invoices'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'add')) ?>" class="button tiny success radius right" style="margin-top: 20px"><i class="fi-plus"></i>&nbsp;<?php echo __('Create Invoice'); ?></a>
			</header>
			<!-- Contenido -->
			<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('project_id'); ?></th>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('amount'); ?></th>
					<th><?php echo $this->Paginator->sort('due'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($invoices as $invoice): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($invoice['Project']['code'], array('controller' => 'projects', 'action' => 'view', $invoice['Project']['id'])); ?>
				</td>
				<td><?php echo h($invoice['Invoice']['title']); ?>&nbsp;</td>
				<td><?php
					switch (h($invoice['Invoice']['status'])) {
					 	case 0: // draft
					 		echo '<span class="secondary radius label" style="width: 100%; text-align: center">' . __('Draft') . '</span>';
					 		break;
					 	case 1: // sent
					 		echo '<span class="warning radius label" style="width: 100%; text-align: center">' . __('Sent') . '</span>';
					 		break;
					 	case 2: // waitting payment
					 		echo '<span class="alert radius label" style="width: 100%; text-align: center">' . __('Waitting') . '</span>';
					 		break;
					 	case 3: // Parcial
					 		echo '<span class="primary radius label" style="width: 100%; text-align: center">' . __('Parcial') . '</span>';
					 		break;
					 	case 4: // Paid
					 		echo '<span class="success radius label" style="width: 100%; text-align: center">' . __('Paid') . '</span>';
					 		break;
					 	default: // unknown
					 		echo '<span class="alert radius label" style="width: 100%; text-align: center">' . __('Unknown') . '</span>';
					 		break;
					 } ?>
				</td>
				<td><?php echo number_format( h($invoice['Invoice']['amount']), 2) . h($invoice['Invoice']['currency_symbol']); ?>&nbsp;</td>
				<td><?php echo number_format( h($invoice['Invoice']['due']), 2); ?>&nbsp;</td>
				<td class="action">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $invoice['Invoice']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-mail"></i> ' . __('Send invoice'), array('action' => 'send', $invoice['Invoice']['id']), array('escape' => false, 'data-reveal-id' => 'sendInvoice', 'data-reveal' => true, 'class' => 'linkReceiver')),
						$this->Html->link('<i class="fi-paperclip"></i> ' . __('Permalink'), array('action' => 'permalink', $invoice['Invoice']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-download"></i> ' . __('Download pdf'), array('action' => 'download', $invoice['Invoice']['id']), array('escape' => false))
						);

					if($invoice['Invoice']['status'] == 0){
						$links[] = $this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $invoice['Invoice']['id']), array('escape' => false));
					}

					$links[] = 
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $invoice['Invoice']['id']), array('action' => 'delete', $invoice['Invoice']['id']));

					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ', $links, $invoice['Invoice']['id']); 
					?>
					<input type="hidden" id="receiverMail" value="<?php echo $invoice['Client']['email']; ?>">
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
			<!-- Paginación -->
			<?php echo $this->element('paginator'); ?>
			<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>

<!-- Modal add tax -->
<div id="sendInvoice" class="reveal-modal tiny" data-reveal>
	<h2><?php echo __('Send invoice'); ?></h2>
	<div class="clients form">
	<form id="addClientForm" method="post" action="<?php echo Router::url(array('controller' => 'Invoices', 'action' => 'sendInvoice')); ?>" data-abide>
		<div>
			<b><?php echo __('The invoice will be sent to:'); ?></b><br />
			<a id="receiverA"></a>
			<input type="hidden" id="receiver" name="receiver" value="">
		</div><br />
		<div>
			<label><?php echo __('Subject'); ?> <small>required</small>
				<input type="text" name="subject" required>
			</label>
			<small class="error">Subject is required and must be a string.</small>
		</div>

		<div>
			<label><?php echo __('Message'); ?> <small>required</small>
				<textarea name="message"></textarea>
			</label>
			<small class="error">Message is required and must be a string.</small>
		</div>
		<input type="submit" class="button tiny success radius" value="<?php echo __('Send'); ?>">
	</form>
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>

<script type="text/javascript">
	$('.linkReceiver').on('click', function () {
		var element = $(this).parent();
		var list = element.parent();
		var cell = list.parent();
		var receiver = cell.find('#receiverMail').val();

		$('#receiver').val(receiver);
		$('#receiverA').html(receiver);
	});
</script>
