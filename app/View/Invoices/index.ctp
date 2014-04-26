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
					<th>Amount</th>
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
				<td>&nbsp;</td>
				<td><?php echo h($invoice['Invoice']['due']); ?>&nbsp;</td>
				<td class="action">
					<?php 
					$links = array(
						$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $invoice['Invoice']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-mail"></i> ' . __('Send invoice'), array('action' => 'send', $invoice['Invoice']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-paperclip"></i> ' . __('Permalink'), array('action' => 'permalink', $invoice['Invoice']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-download"></i> ' . __('Download pdf'), array('action' => 'download', $invoice['Invoice']['id']), array('escape' => false)),
						$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $invoice['Invoice']['id']), array('escape' => false)),
						$this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $invoice['Invoice']['id']), array('action' => 'delete', $invoice['Invoice']['id']))
					);
					echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ', $links, $invoice['Invoice']['id']); 
					?>
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