// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation({
  abide : {
    patterns: {
      pass: /^((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])|(?=.*[a-z])(?=.*[A-Z])(?=.*[\\W])|(?=.*[a-z])(?=.*[0-9])(?=.*[\\W])|(?=.*[A-Z])(?=.*[0-9])(?=.*[\\W])).{6,}$/,
      invoiceNumber: /^\d{1,9}$/,
      email: /^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{1,63}$/,
      minLength3: /^.{3,}$/
    },
    validators: {
    	dateValidate: function(el, required, parent) {
    		if($('#dpInvoiceDate').val() > $('#dpDueDate').val() || $('#dpInvoiceDate').val().length == 0 || $('#dpDueDate').val().length == 0) {
    			return false;
    		} else {
    			$('.dateError').removeClass('error');
    			return true;
    		}
    	},
    	dateValidateNoRequired: function(el, required, parent) {
    		if(($('#dpProjectStartingDate').val() > $('#dpProjectDeadLine').val()) && $('#dpProjectDeadLine').val().length>0) {
    			return false;
    		} else {
    			$('.dateError').removeClass('error');
    			return true;
    		}
    	},
        equalTo: function(el, required, parent) {
          if($('#password').val() === $('#password2').val()) {
                return true;
            } else {
                return false;
            }
        }
    }
  }
});
