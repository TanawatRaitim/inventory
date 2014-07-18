$(function() {
	// alert('hello ims');
	$("#product_id").blur(function() {
		var str = $(this).val();
		str = str.toUpperCase();
		$(this).val(str);
	});
	
	$("#refer_date").datetimepicker({
		pickTime: false
	});


	$("#product_good, #product_unusable, #product_deteriorate").blur(function(e) {
		// alert('on blur');
		var total_receive = parseInt($("#product_good").val()) + parseInt($("#product_deteriorate").val()) + parseInt($("#product_unusable").val());

		$("#product_receive").val(total_receive);
	});
	
	$('input, select').keydown( function (event) { //event==Keyevent
		    if(event.which == 13) {
		        var inputs = $(this).closest('form').find(':input:visible');
		        inputs.eq( inputs.index(this)+ 1 ).focus();
		        event.preventDefault(); //Disable standard Enterkey action
		    }
		    // event.preventDefault(); <- Disable all keys  action
		});
		// if is not work search on google PlusAs Tab****

}); 