$(document).ready(function(){
	$('#btnInsertService').click(function(event){
		event.preventDefault();
		var service = $('#serviceLine');
		var table = '#tableServiceLine';
		if(service != undefined){
			if(service.val() != undefined){
				addLineService(table, service.val());
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
				console.log('Product inserted');
			}else{
				console.log('Product not valid');
			}
		}else{
			console.log('Error inserting product');
		}
	});

	function addLineService(table, id){
		var respond = "";
		// Petición ajax
		$.post("http://timesapp.com/invoices/getLine/1/" + id)
			.done(function( data ) {
			respond = data;
			//Insertar linea
			$('#emptyListService').remove();
			$(table).find('tbody').append('<tr>' + respond + '<td><span class="remove-line">X</span></td></tr>');
			$(table).on('click', '.remove-line', function(){
				$(this).parents('tr').remove();
			});
		});
	}

	function addLineProduct(table, id){
		var respond = "";
		// Petición ajax
		$.post("http://timesapp.com/invoices/getLine/2/" + id)
			.done(function( data ) {
			respond = data;
			//Insertar linea
			$('#emptyListService').remove();
			$(table).find('tbody').append('<tr>' + respond + '<td><span class="remove-line">X</span></td></tr>');
			$(table).on('click', '.remove-line', function(){
				$(this).parents('tr').remove();
			});
		});
	}
});