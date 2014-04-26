<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Create Invoice'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'index')); ?>" class="button tiny alert radius right" style="margin-top: 20px"><i class="fi-x"></i>&nbsp;<?php echo __('Cancel'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="invoices form">
			<form action="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'add')); ?>" id="InvoiceAddForm" method="post" accept-charset="utf-8" data-abide>
				<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
			<!-- Formulario básico -->	
			<div class="row">
				<div class="medium-4 large-4 columns">
					<div>
						<label><?php echo __('Client') ?> <small>Required</small>
						<select name="data[Invoice][client_id]" required>
							<option value=""><?php echo __('Select a client') ?></option>
						</select>
						</label>
						<small class="error">Please, select a client</small>
					</div>
					<div>
						<label><?php echo __('Project') ?>
						<select name="data[Invoice][project_id]">
							<option value=""><?php echo __('Select a client before') ?></option>
						</select>
						</label>
					</div>
				</div>
				<div class="medium-4 large-4 columns">
					<div>
						<label><?php echo __('Invoice title') ?>
							<input name="data[Invoice][title]" type="text" length="25">
						</label>
					</div>
				</div>
				<div class="medium-4 large-4 columns">
					<div>
						<label><?php echo __('Invoice date') ?> <small>Required</small>
							<input name="data[Invoice][invoice_date]" type="date" required>
						</label>
						<small class="error">Please, select invoice date</small>
					</div>
					<div>
						<label><?php echo __('Due date') ?> <small>Required</small>
							<input name="data[Invoice][due_date]" type="date" required>
						</label>
						<small class="error">Please, select a due date</small>
					</div>
				</div>
			</div>

			<!-- Mostrar más -->			
			<dl class="accordion" data-accordion>
				<dd>
					<a href="#showMorePanel"><i class="fi-widget"></i> <?php echo __('Invoice Settings') ?></a>
				    <div id="showMorePanel" class="content">
				    	<div class="row">
				    		<div class="medium-12 large-12 columns">
				    			<div class="row">
				    			<div class="medium-4 large-4 columns">
				    				<label><?php echo __('Currency Symbol') ?></label>
				    				<select name="data[Invoice][currency_symbol]">
										<option value="" selected="selected"></option>
										<option value="$">$</option>
										<option value="€">€</option>
										<option value="£">£</option>
										<option value="¥">¥</option>
				    				</select>
				    			</div>
				    			<div class="medium-4 large-4 columns">
				    				<label><?php echo __('Currency Code') ?></label>
				    				<select name="data[Invoice][currency_code]">
										<option value="" selected="selected"></option>
										<option value="USD">USD</option>
										<option value="EUR">EUR</option>
										<option value="GBP">GBP</option>
										<option value="JPY">JPY</option>
										<option value="AUD">AUD</option>
										<option value="CAD">CAD</option>
										<option value="BRL">BRL</option>
										<option value="CZK">CZK</option>
										<option value="DKK">DKK</option>
										<option value="HKD">HKD</option>
										<option value="HUF">HUF</option>
										<option value="ILS">ILS</option>
										<option value="MYR">MYR</option>
										<option value="MXN">MXN</option>
										<option value="NZD">NZD</option>
										<option value="NOK">NOK</option>
										<option value="PHP">PHP</option>
										<option value="PLN">PLN</option>
										<option value="SGD">SGD</option>
										<option value="SEK">SEK</option>
										<option value="CHF">CHF</option>
										<option value="TWD">TWD</option>
										<option value="THB">THB</option>
				    				</select>
				    			</div>
				    			<div class="medium-4 large-4 columns">
					    			<div class="divToggle" style="margin-top: 22px">
					                	<input name="data[Invoice][display_country]" type="checkbox" id="displayCountry" checked>
				                		<label class="firstLabel" for="displayCountry"><i></i></label>
				                		<label class="toggleLabel" for="displayCountry"><?php echo __('Display country') ?></label>
			              			</div>
			              		</div>
		              			</div>		    			
				    		</div>
				    	</div>
				    	<div class="row">
				    		<div class="medium-6 large-6 columns">
				    			<label><?php echo __('Notes visible to client') ?>
								<textarea name="data[Invoice][note]" id="" cols="30" rows="5"></textarea>
				    			</label>
				    		</div>
				    		<div class="medium-6 large-6 columns">
				    			<label><?php echo __('Terms') ?>
								<textarea name="data[Invoice][terms]" id="" cols="30" rows="5"></textarea>
				    			</label>
				    		</div>
				    	</div>
				    </div>
				</dd>
			</dl>

			<!-- Servicios -->
			<div class="row">
				<a href="#" class="button tiny success radius" style="margin-top: 20px" data-reveal-id="addServiceLineModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('Service'); ?></a>
				<table  cellpadding="0" cellspacing="0" id="tableServiceLine">
					<thead>
						<tr>
							<th><?php echo __('Service') ?></th>
							<th><?php echo __('Description') ?></th>
							<th><?php echo __('Hours') ?></th>
							<th><?php echo __('Rate') ?></th>
							<th><?php echo __('Tax') ?></th>
							<th><?php echo __('Total') ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr id="emptyListService">
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Productos -->
			<div class="row">
				<a href="#" class="button tiny success radius" style="margin-top: 20px" data-reveal-id="addProductLineModal" data-reveal><i class="fi-plus"></i>&nbsp;<?php echo __('Product'); ?></a>
				<table  cellpadding="0" cellspacing="0" id="tableProductLine">
					<thead>
						<tr>
							<th><?php echo __('Product') ?></th>
							<th><?php echo __('Description') ?></th>
							<th><?php echo __('Quantity') ?></th>
							<th><?php echo __('Unit price') ?></th>
							<th><?php echo __('Tax') ?></th>
							<th><?php echo __('Total') ?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr id="emptyListProduct">
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Total -->
			<div class="row">
				<div class="medium-12 large-12 columns">
					<h3 class="right"><?php echo __('Total') ?> 0.00</h3>
				</div>
			</div>
			<br><br>

			<!-- Submit -->
			<input type="submit" class="button tiny success radius right" value="<?php echo __('Save invoice') ?>">
			</form>
			</div>
			<!-- Fin contenido -->
			</div>
		</div>
	</div>
</div>
<!-- Modal add service line -->
<div id="addServiceLineModal" class="reveal-modal small" data-reveal>
	<h2><?php echo __('Add service'); ?></h2>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<label> <small>Required</small>
				<select name="" id="serviceLine">
					<option value=""><?php echo __('Select an option') ?></option>
					<?php foreach($services as $key => $service): ?>
					<option value="<?php echo $key ?>"><?php echo h($service) ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		</div>
	</div>
	<a href="#" class="button tiny success radius right" id="btnInsertService"><?php echo __('Insert') ?></a>
	<a class="close-reveal-modal">&#215;</a> 
</div>
<!-- Modal add product line -->
<div id="addProductLineModal" class="reveal-modal small" data-reveal>
	<h2><?php echo __('Add product'); ?></h2>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<label> <small>Required</small>
				<select name="" id="productLine">
					<option value=""><?php echo __('Select an option') ?></option>
					<?php foreach($products as $key => $product): ?>
					<option value="<?php echo $key ?>"><?php echo h($product) ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		</div>
	</div>
	<a href="#" class="button tiny success radius right" id="btnInsertProduct"><?php echo __('Insert') ?></a>
	<a class="close-reveal-modal">&#215;</a> 
</div>
<?php echo $this->Html->script('invoices'); ?>
