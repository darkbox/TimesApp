<p class="paginator-counter">
<?php
echo $this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>
</p>
<div class="paging">
<?php
	echo $this->Paginator->prev('←' . __('Previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ' '));
	echo $this->Paginator->next(__('Next') . '→', array(), null, array('class' => 'next disabled'));
?>
</div>