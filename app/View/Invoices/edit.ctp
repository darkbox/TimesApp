<?php 
	$currency_symbol = array("", "$", "€", "£", "¥");
	$currency_code = array("", "USD", "EUR", "GBP", "JPY", "AUD", "CAD", "BRL", "CZK", "DKK", "HKD", "HUF", "ILS", "MYR", "MXN", "NZD", "NOK", "PHP", "PLN", "SGD", "SEK", "CHF", "TWD", "HTB");
?>
<style>
	#notify-service, #notify-product {
		position: absolute;
		top: 175px;
		left: 320px;
		display: none;
	}
</style>
<div class="page-wrapper">
	<div class="row">
		<div class="large-12 medium-12 columns">
			<div class="page-content">
			<!-- Cabecera -->
			<header>
				<h1><?php echo __('Edit Invoice'); ?></h1>
				<a href="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'index')); ?>" class="button tiny alert radius right" style="margin-top: 20px"><i class="fi-x"></i>&nbsp;<?php echo __('Cancel'); ?></a>
			</header>
			<!-- Contenido -->
			<div class="invoices form">
			<form action="<?php echo Router::url(array('controller' => 'invoices', 'action' => 'edit', $this->request->data['Invoice']['id'])); ?>" id="InvoiceEditForm" method="post" accept-charset="utf-8" data-abide>
				<input type="hidden" name="data[Invoice][id]" value="<?php echo  $this->request->data['Invoice']['id'] ?>">
				<div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
			<!-- Formulario básico -->	
			<div class="row">
				<div class="medium-4 large-4 columns">
					<div>
						<label><?php echo __('Client') ?> <small>Required</small>
						<select name="data[Invoice][client_id]" required id="clientsList">
							<option value=""><?php echo __('Select a client') ?></option>
							<?php foreach($clients as $key => $client): ?>
							<option value="<?php echo $key ?>" <?php if($this->request->data['Client']['id'] == $key){ echo 'selected="selected"';} ?>><?php echo h($client) ?></option>
							<?php endforeach; ?>
						</select>
						</label>
						<small class="error">Please, select a client</small>
						
					</div>
					<div>
						<label><?php echo __('Project') ?>
						<select name="data[Invoice][project_id]" id="projectsByClient">
							<option value=""><?php echo __('Select a client before') ?></option>
							<?php foreach($projects as $key => $project): ?>
							<option value="<?php echo $key ?>" <?php if($this->request->data['Project']['id'] == $key){ echo 'selected="selected"';} ?>><?php echo h($project) ?></option>
							<?php endforeach; ?>
						</select>
						</label>
						
					</div>
				</div>
				<div class="medium-4 large-4 columns">
					<div>
						<label><?php echo __('Invoice title/number') ?> <small>Required</small>
							<input name="data[Invoice][title]" type="text" length="25" value="<?php echo $this->request->data['Invoice']['title'] ?>" required>
						</label>
						<small class="error">This field is required</small>
					</div>
				</div>
				<div class="medium-4 large-4 columns">
					<div class="dateError">
						<label><?php echo __('Invoice date') ?> <small>Required</small>
							<input name="data[Invoice][invoice_date]" id="dpInvoiceDate" type="text" placeholder="YYYY-MM-DD" required data-abide-validator="dateValidate" value="<?php echo $this->request->data['Invoice']['invoice_date'] ?>">
						</label>
						<small class="error">Please, select Invoice date that fall on or before Due date</small>
					</div>
					<div class="dateError">
						<label><?php echo __('Due date') ?> <small>Required</small>
							<input name="data[Invoice][due_date]" id="dpDueDate" type="text" placeholder="YYYY-MM-DD" required data-abide-validator="dateValidate" value="<?php echo $this->request->data['Invoice']['due_date'] ?>">
						</label>
						<small class="error">Please, select a due date that fall on or after Invoice date</small>
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
										<?php foreach($currency_symbol as $symbol): ?>
										<option value="<?php echo $symbol; ?>" <?php if($symbol == $this->request->data['Invoice']['currency_symbol']){ echo 'selected'; } ?>><?php echo $symbol; ?></option>
										<?php endforeach; ?>
				    				</select>
				    			</div>
				    			<div class="medium-4 large-4 columns">
				    				<label><?php echo __('Currency Code') ?></label>
				    				<select name="data[Invoice][currency_code]">
										<?php foreach($currency_code as $code): ?>
										<option value="<?php echo $code; ?>" <?php if($code == $this->request->data['Invoice']['currency_code']){ echo 'selected'; } ?>><?php echo $code; ?></option>
										<?php endforeach; ?>
				    				</select>
				    			</div>
				    			<div class="medium-4 large-4 columns">
					    			<div class="divToggle" style="margin-top: 22px">
					                	<input name="data[Invoice][display_country]" type="checkbox" id="displayCountry" <?php if($this->request->data['Invoice']['display_country']){ echo 'checked'; } ?>>
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
								<textarea name="data[Invoice][note]" id="" cols="30" rows="5"><?php echo h($this->request->data['Invoice']['note']); ?></textarea>
				    			</label>
				    		</div>
				    		<div class="medium-6 large-6 columns">
				    			<label><?php echo __('Terms') ?>
								<textarea name="data[Invoice][terms]" id="" cols="30" rows="5"><?php echo h($this->request->data['Invoice']['terms']); ?></textarea>
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
						<?php if(isset($this->request->data['Line'])): ?>
							<?php $index = 999; ?>
							<?php foreach($this->request->data['Line'] as $line): ?>
							<?php if($line['type'] == 1): ?>
							<?php $index++; ?>
							<tr class="trService">
								<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($line['code']); ?>">
								<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="1"></td>
								<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($line['description']); ?>"></td>
								<td><input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="<?php echo h($line['amount_hours']) ?>"></td>
								<td>
									<input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($line['rate']); ?>"></td>
								<td>
									<select name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" style="margin: 0px;">
										<?php foreach($taxes as $tax): ?>
											<option tax-rate="<?php echo $tax['Tax']['rate'] ?>" value="<?php echo $tax['Tax']['id'] ?>" <?php if($tax['Tax']['id'] == $line['tax_id']){echo 'selected'; } ?> ><?php echo h($tax['Tax']['description']); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td class="value">0.00</td>
								<td><span class="remove-line"><i class="fi-minus"></i></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php else: ?>
						<tr id="emptyListService">
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
						<?php endif; ?>
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
						<?php if(isset($this->request->data['Line'])): ?>
							<?php $index = 9999; ?>
							<?php foreach($this->request->data['Line'] as $line): ?>
							<?php if($line['type'] == 2): ?>
							<?php $index++; ?>
							<tr class="trProduct">
								<td><input type="text" name="data[Line][<?php echo $index; ?>][code]" value="<?php echo h($line['code']); ?>">
								<input type="hidden" name="data[Line][<?php echo $index; ?>][type]" value="2"></td>
								<td><input type="text" name="data[Line][<?php echo $index; ?>][description]" value="<?php echo h($line['description']); ?>"></td>
								<td><input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][amount_hours]" class="aHours" value="<?php echo h($line['amount_hours']) ?>"></td>
								<td>
									<input type="number" min="0" max="9999999999" name="data[Line][<?php echo $index; ?>][rate]" class="rate" value="<?php echo h($line['rate']); ?>"></td>
								<td>
									<select name="data[Line][<?php echo $index; ?>][tax_id]" class="tax" style="margin: 0px;">
										<?php foreach($taxes as $tax): ?>
											<option tax-rate="<?php echo $tax['Tax']['rate'] ?>" value="<?php echo $tax['Tax']['id'] ?>" <?php if($tax['Tax']['id'] == $line['tax_id']){echo 'selected'; } ?> ><?php echo h($tax['Tax']['description']); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td class="value">0.00</td>
								<td><span class="remove-line"><i class="fi-minus"></i></span></td>
							</tr>
							<?php endif; ?>
							<?php endforeach; ?>
						<?php else: ?>
						<tr id="emptyListProduct">
							<td colspan="7" style="text-align: center">List empty</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<!-- Total -->
			<div class="row">
				<div class="medium-12 large-12 columns">
					<h3 class="right"><small><?php echo __('Services') ?>: <span id="subServices">0.00</span> + <?php echo __('Products') ?>: <span id="subProducts">0.00</span> = </small><?php echo __('Total') ?> <span id="total">0.00</span></h3>
				</div>
			</div>
			<br><br>

			<!-- Submit -->
			<input type="hidden" id="invoice_amount" name="data[Invoice][amount]" value="0">
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
	<div id="notify-service">Line added</div>
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
	<div id="notify-product">Line added</div>
	<a href="#" class="button tiny success radius right" id="btnInsertProduct"><?php echo __('Insert') ?></a>
	<a class="close-reveal-modal">&#215;</a> 
</div>
<script type="text/javascript">
	$('#InvoiceAddForm').ready(function (){
    var invalid_fields = $(this).find('[data-invalid]');
    invalid_fields.blur();
  });
</script>
<script type="text/javascript">
    $(document).ready(function(){

	var index = 0;
	initRemoveButtons('#tableServiceLine');
	initRemoveButtons('#tableProductLine');


	$(".accordion").on("click", "a", function (event) {
       $(".accordion").find(".content").slideToggle("fast");
	});


	$('#btnInsertService').click(function(event){
		event.preventDefault();
		var service = $('#serviceLine');
		var table = '#tableServiceLine';
		if(service != undefined){
			if(service.val() != undefined){
				addLineService(table, service.val());
				var notify = $('#notify-service');
				notify.fadeIn("fast");
				notify.fadeOut("slow");
				console.log('Service inserted');
			}else{
				console.log('Service not valid');
			}
		}else{
			console.log('Error inserting service');
		}
	});

	$('#btnInsertProduct').click(function(event){
		event.preventDefault();
		var product = $('#productLine');
		var table = $('#tableProductLine');
		if(product != undefined){
			if(product.val() != undefined){
				addLineProduct(table, product.val());
				var notify = $('#notify-product');
				notify.fadeIn("fast");
				notify.fadeOut("slow");
				console.log('Product inserted');
			}else{
				console.log('Product not valid');
			}
		}else{
			console.log('Error inserting product');
		}
	});

	$('#clientsList').on('change', function(){
		getProjectsByClient();
	});


	function initRemoveButtons(table){
		$(table).on('click', '.remove-line', function(){
			$(this).parents('tr').remove();
			calcularSubtotal();
			calcularTotal();

		});

		$('.aHours, .rate, .tax').on('change keyup', function(){
			calcularParcial();
			calcularSubtotal();
			calcularTotal();
		});

		calcularParcial();
		calcularSubtotal();
		calcularTotal();
		numbersOnly();
	}

	function addLineService(table, id){
		var respond = "";
		// Petición ajax
		$.post("<?php echo Router::url(array('controller' => 'invoices', 'action' => 'getLine')) ?>/1/" + id + "/" + index++)
			.done(function( data ) {
			respond = data;
			//Insertar linea
			$(table).find('#emptyListService').remove();
			$(table).find('tbody').append('<tr class="trService">' + respond + '<td><span class="remove-line"><i class="fi-minus"></i></span></td></tr>');
			$(table).on('click', '.remove-line', function(){
				$(this).parents('tr').remove();
				calcularSubtotal();
				calcularTotal();
			});

			$('.aHours, .rate, .tax').on('change keyup', function(){
				calcularParcial();
				calcularSubtotal();
				calcularTotal();
			});
			numbersOnly(); //solo números en los input numéricos
		});
	}

	function addLineProduct(table, id){
		var respond = "";
		// Petición ajax
		$.post("<?php echo Router::url(array('controller' => 'invoices', 'action' => 'getLine')) ?>/2/" + id + "/" + index++)
			.done(function( data ) {
			respond = data;
			//Insertar linea
			$(table).find('#emptyListProduct').remove();
			$(table).find('tbody').append('<tr class="trProduct">' + respond + '<td><span class="remove-line"><i class="fi-minus"></i></span></td></tr>');
			$(table).on('click', '.remove-line', function(){
				$(this).parents('tr').remove();
				calcularSubtotal();
				calcularTotal();
			});

			$('.aHours, .rate, .tax').on('change keyup', function(){
				calcularParcial();
				calcularSubtotal();
				calcularTotal();
			});

			calcularParcial();
			calcularSubtotal();
			calcularTotal();

			numbersOnly(); //solo números en los input numéricos
		});
	}

	function getProjectsByClient() {
	    $.ajax({
	    	type: "POST",
		    url: '<?php echo Router::url(array('controller' => 'invoices', 'action' => 'getProjectsByClient')) ?>',
		    data: { clientIdJS: $('#clientsList').val() },
		    cache: false,
		    success: function(response){

		    	$('#projectsByClient').prop('disabled', false);
	            $('#projectsByClient').empty();
	            $('#projectsByClient').append(response);
		    }
		});
	}

	function calcularParcial() {
		var bruto = 0;
		var neto = 0;
		var aHours = 0;
		var rate = 0;
		var tax = 0;
		var value = 0;

		$('.trService').each(function(){
			aHours = $(this).find('.aHours').val();
			rate = $(this).find('.rate').val();
			tax = $(this).find('.tax').find('option:selected').attr('tax-rate');
			value = $(this).find('.value');

			bruto = aHours * rate;
			neto = bruto + ((bruto*tax)/100);

			$(value).empty;
			$(value).html(roundToTwo(neto).toFixed(2));
		});

		$('.trProduct').each(function(){
			aHours = $(this).find('.aHours').val();
			rate = $(this).find('.rate').val();
			tax = $(this).find('.tax').find('option:selected').attr('tax-rate');
			value = $(this).find('.value');

			bruto = aHours * rate;
			neto = bruto + ((bruto*tax)/100);

			$(value).empty;
			$(value).html(roundToTwo(neto).toFixed(2));
		});

	}

	function calcularSubtotal() {
		var sum = parseInt(0);
		var value = 0;
		var cont = 0;

		$('.trService').each(function(){
			cont++;
			value = $(this).find('.value');

			sum += parseFloat($(value).html());

			$('#subServices').empty;
			$('#subServices').html(roundToTwo(sum).toFixed(2));
		});

		if(cont==0) {
			$('#subServices').empty;
			$('#subServices').html(0.00.toFixed(2));
		}

		sum = parseInt(0);
		cont = 0;

		$('.trProduct').each(function(){
			cont++;
			value = $(this).find('.value');

			sum += parseFloat($(value).html());
			
			$('#subProducts').empty;
			$('#subProducts').html(roundToTwo(sum).toFixed(2));
		});

		if(cont==0) {
			$('#subProducts').empty;
			$('#subProducts').html(0.00.toFixed(2));
		}


	}

	function calcularTotal() {
		var total = 0;

		total = parseFloat($('#subServices').html()) + parseFloat($('#subProducts').html())

		$('#total').empty();
		$('#total').html(roundToTwo(total).toFixed(2));
		$('#invoice_amount').val(roundToTwo(total).toFixed(2));
	}

	function numbersOnly() {
		$('.aHours, .rate').on('keydown', function(event){
			if($(this).val().length==0 && (event.which==190 || event.which==110)) {
				event.preventDefault();
			}

			if((event.which>=48 && event.which<=57) || (event.which>=96 && event.which<=105) || event.which==9 || event.which==8 || (event.which>=37 && event.which<=40) || event.which==190 || event.which==110 || event.which==46) {
			
			} else {
				event.preventDefault();
			}

			if($(this).val().length>9 && ((event.which>=48 && event.which<=57 ) || (event.which>=96 && event.which<=105) || event.which==190 || event.which==110)) {
				event.preventDefault();
			}

			if($(this).val().indexOf('.')!=-1 && (event.which==190 || event.which==110) ) {
				event.preventDefault();
			}

		});
	}

	function roundToTwo(num) {    
   		return +(Math.round(num + "e+2")  + "e-2");
	}

});
</script>
<?php echo $this->Html->script('zebra_datepicker'); ?>
<?php echo $this->Html->script('datepicker'); ?>

