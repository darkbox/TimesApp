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
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('project_id'); ?></th>
					<th><?php echo $this->Paginator->sort('status'); ?></th>
					<th><?php echo $this->Paginator->sort('amount'); ?></th>
					<th><?php echo $this->Paginator->sort('due'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($invoices as $invoice): ?>
			<tr>
				<td><?php echo $this->Html->link(h($invoice['Invoice']['title']), array('controller' => 'invoices', 'action' => 'view', (h($invoice['Invoice']['id']) * $seed)), array('target' => '_blank')); ?>&nbsp;</td>
				<td>
					<?php 
					if($invoice['Project']['id'] > 0){
						echo $this->Html->link($invoice['Project']['code'], array('controller' => 'projects', 'action' => 'view', $invoice['Project']['id']));
					}else{
						echo __('None');
					}?>
				</td>
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
					 	case 5: // Due
					 		echo '<span class="alert radius label" style="width: 100%; text-align: center">' . __('Due') . '</span>';
					 		break;
					 	default: // unknown
					 		echo '<span class="alert radius label" style="width: 100%; text-align: center">' . __('Unknown') . '</span>';
					 		break;
					 } ?>
				</td>
				<td style="text-align: right"><?php echo number_format( h($invoice['Invoice']['amount']), 2) . h($invoice['Invoice']['currency_symbol']); ?>&nbsp;</td>
				<td style="text-align: right"><?php echo number_format( h($invoice['Invoice']['due']), 2) . h($invoice['Invoice']['currency_symbol']); ?>&nbsp;</td>
				<td class="action">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-mail"></i> ' . __('Send invoice'), array('action' => 'send', $invoice['Invoice']['id']), array('escape' => false, 'data-reveal-id' => 'sendInvoice', 'data-reveal' => true, 'class' => 'linkReceiver', 'data-id' => $invoice['Invoice']['id'], 'data-en' => ($invoice['Invoice']['id'] * $seed))),
						$this->Html->link('<i class="fi-paperclip"></i> ' . __('Permalink'), array('action' => 'view', ($invoice['Invoice']['id'] * $seed)), array('escape' => false, 'target' => '_blank')),
						$this->Html->link('<i class="fi-download"></i> ' . __('Download pdf'), array('action' => 'generatePDF', $invoice['Invoice']['id']), array('escape' => false))
						);

					if($invoice['Invoice']['status'] == 0){
						$links[] = $this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $invoice['Invoice']['id']), array('escape' => false));
					}

					if($invoice['Invoice']['status'] < 1){
						$links[] = 
							$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $invoice['Invoice']['id']), array('action' => 'delete', $invoice['Invoice']['id']));
					}

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

<!-- Modal send invoice -->
<div id="sendInvoice" class="reveal-modal tiny" data-reveal>
	<h2><?php echo __('Send invoice'); ?></h2>
	<div class="clients form">
	<form id="addClientForm" method="post" action="<?php echo Router::url(array('controller' => 'Invoices', 'action' => 'sendInvoice')); ?>" data-abide>
		<div>
			<b><?php echo __('The invoice will be sent to:'); ?></b><br />
			<a id="receiverA"></a>
			<input type="hidden" id="receiver" name="receiver" value="">
			<input type="hidden" id="invoice_id" name="invoice_id" value="">
		</div><br />
		<div>
			<label><?php echo __('Subject'); ?> <small>required</small>
				<input type="text" name="subject" value="<?php echo $appSettings['email_subject']; ?>" required>
			</label>
			<small class="error">Subject is required and must be a string.</small>
		</div>

		<div>
			<label><?php echo __('Message'); ?> <small>required</small>
				<textarea name="message" id="responseMessage" rows="8" required></textarea>
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

		var data_id = $(this).attr('data-id');
		var data_en = $(this).attr('data-en');
		var respond = "";
		$.post(getBaseURL() + "invoices/getMessage/" + data_en)
			.done(function( data ) {
			respond = data;
			$('#responseMessage').html(respond);
		});

		$('#invoice_id').val(data_id);
		$('#receiver').val(receiver);
		$('#receiverA').html(receiver);

		function getBaseURL() {
	    var url = location.href;
	    var baseURL = url.substring(0, url.indexOf('/', 14));

	    if (baseURL.indexOf('http://localhost') != -1) {
	        var url = location.href;
	        var pathname = location.pathname;
	        var index1 = url.indexOf(pathname);
	        var index2 = url.indexOf("/", index1 + 1);
	        var baseLocalUrl = url.substr(0, index2);

	        return baseLocalUrl + "/";
	    }
	    else {
	        // Root Url for domain name
	        return baseURL + "/";
	    }
	}
	});
</script>
