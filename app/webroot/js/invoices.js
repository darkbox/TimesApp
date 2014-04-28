$(document).ready(function(){

	var index = 0;
	initRemoveButtons('#tableServiceLine');

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

	$('#clientsList').on('change', function(){
		getProjectsByClient();
	});


	function initRemoveButtons(table){
		$(table).on('click', '.remove-line', function(){
				$(this).parents('tr').remove();
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
		$.post(getBaseURL() + "invoices/getLine/1/" + id + "/" + index++)
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
		$.post(getBaseURL() + "invoices/getLine/2/" + id + "/" + index++)
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
		    url: getBaseURL() + 'invoices/getProjectsByClient',
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

			if($(this).val().indexOf('.')!=-1 && event.which==190) {
				event.preventDefault();
			}

		});
	}

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

	function roundToTwo(num) {    
   		return +(Math.round(num + "e+2")  + "e-2");
	}

});