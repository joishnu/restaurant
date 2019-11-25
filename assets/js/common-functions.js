var CommonFunctions = {
  showErrors: function(errors, form_id) {
    var form = $('#' + form_id);
    form.find('.form-group').removeClass('has-error has-danger');
    form.find('.help-block').remove();
    $.each(errors, function(name, msg) {
      form.find('[name='+ name +']').closest('.form-group').addClass('has-error has-danger');
      form.find('[name='+ name +']').after('<label for="' + name + '" class="error">' + msg + '</label>');
    });
  },
  removeAllErrors: function(form_id) {
    var form = $('#' + form_id);
    form.find('.form-group').removeClass('has-error has-danger');
    form.find('.help-block').remove();
  },
  addError: function(name, error, form_id) {
    var form = $('#' + form_id);
    form.find('[name=' + name + ']').after('<label for="' + name + '" class="error">' + error + '</label>');
    form.find('[name=' + name + ']').closest('.form-group').addClass('has-error has-danger');
  },
  addArrayError: function(name, error, form_id) {
    var form = $('#' + form_id);
    form.find('#' + name).after('<label for="' + name + '" class="error">' + error + '</label>');
    form.find('#' + name).closest('.form-group').addClass('has-error has-danger');
  },
  resetForm: function(form_id) {
    var form = $('#' + form_id);
    form.find('.form-group').removeClass('has-error has-danger');
    form.find('.help-block').remove();

    form.find('input:text:not(:disabled, [readonly])').attr('value', '').val('');
    form.find('input[type="number"]:not(:disabled, [readonly])').attr('value', '').val('');
    form.find('select').find('option[selected]').removeAttr('selected').val('');
    form.find('select').find('option:first').attr('selected', 'selected').trigger('change');
    form.find('textarea').empty().val('');
  },
  alertSuccess: function(data) {
    $.toast({
      text : data.msg,
      showHideTransition : 'slide',  // It can be plain, fade or slide
      textColor : '#eee',            // text color
      allowToastClose : true,       // Show the close button or not
      hideAfter : 3000,              // `false` to make it sticky or time in miliseconds to hide after
      stack : false,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
      textAlign : 'left',            // Alignment of text i.e. left, right, center
      position : 'bottom-left',       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
      icon: 'success',
      loader: false, 
    })
  },
  alertError: function(msg) {
    $.toast({
      text : msg,
      showHideTransition : 'slide',  // It can be plain, fade or slide
      textColor : '#eee',            // text color
      allowToastClose : true,       // Show the close button or not
      hideAfter : 3000,              // `false` to make it sticky or time in miliseconds to hide after
      stack : false,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
      textAlign : 'left',            // Alignment of text i.e. left, right, center
      position : 'bottom-left',       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
      icon: 'error',
      loader: false, 
    })
  }
}