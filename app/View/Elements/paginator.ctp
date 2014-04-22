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
<style type="text/css">
	.paginator-counter{
		font-size: 0.9rem; 
		color: #AAA; 
		margin-bottom: 5px;
	}

	.paging, .prev, .next{
		font-size: 0.9rem;
		color: #5BA4E5;
	}

	.paging .current{
		color: #222;
		font-style: italic;
	}

	.paging a:hover{
		text-decoration: underline;
	}

	.prev{
		margin-right: 5px;
	}

	.next{
		margin-left: 5px;
	}

	.disabled{
		display: none;
	}
</style>