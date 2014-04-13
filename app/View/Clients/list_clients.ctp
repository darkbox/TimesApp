<!-- Contenido -->
<table cellpadding="0" cellspacing="0">
<thead>
	<tr>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('email'); ?></th>
		<th><?php echo $this->Paginator->sort('city'); ?></th>
		<th><?php echo $this->Paginator->sort('state'); ?></th>
		<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
</thead>
<tbody id="clientsTableBody">
<?php foreach ($clients as $client):?>
	<tr>
		<td><?php echo h($client['Client']['name']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['city']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['state']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['phone_number']); ?>&nbsp;</td>
		<td>
			<?php 
				$links = array(
				$this->Html->link('<i class="fi-eye"></i> ' . __('View'), array('action' => 'view', $client['Client']['id']), array('escape' => false)),
				$this->Html->link('<i class="fi-pencil"></i> ' . __('Edit'), array('action' => 'edit', $client['Client']['id']), array('escape' => false)),
				$link3 = $this->Fn5->confirmModal(__('Delete'), '<i class="fi-trash"></i> ' . __('Delete'),__('Are you sure you want to delete # %s?', $client['Client']['id']), array('action' => 'delete', $client['Client']['id'])));

				echo $this->Fn5->dropdownButton('<i class="fi-widget"></i> ' . __('Options'), $links, $client['Client']['id']); 
			?>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
<!-- Paginación -->
<?php echo $this->element('paginator'); ?>
<!-- Fin contenido -->