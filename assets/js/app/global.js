var BASE_URL = location.origin+"/inventory/";

$(function() {
	
	$("#DocRef_Date, #Transport_Date, #DocSale_Date, #Invoice_Date").on('blur',function(e){
		
		if($(this).val()!="")
		{
			//alert('test');
			var result = moment($(this).val(), "DD/MM/YYYY", true).isValid();
			
			if(!result){
				$(this).val("");
			}
			
		}
		//alert($(this).val());
	});
	
	$("a[href='all']>span").removeClass().addClass('badge');
	$("li.active>span").removeClass().addClass('badge');
	$("a[href='yes_appv']>span").removeClass().addClass('badge badge-success');
	$("a[href='reject']>span").removeClass().addClass('badge badge-warning');
	
	$("input:text").focus(function() { $(this).select(); } );
	
	$("#clear_unused_ticket").on('click',function(e){
		e.preventDefault();
		
		var confirm_result = confirm("กดเพื่อยืนยันการล้างค่าข้อมูลที่ไม่ได้ใช้ รวมถึงข้อมูลที่คุณกำลังบันทึกอยู่ด้วย");
		
		if(!confirm_result)
		{
			return false;
		}
		
		$.ajax({
			type: 'GET',
			url: BASE_URL+'manage/clear_unused_ticket',
			dataType: 'json',
			success: function(data){
				if(data.status === true){
					alert(data.description);
					//window.location.href = '/inventory/in/all';
				}else{
					alert(data.description);
				}
			},
			beforeSend: function(){
				
			},
			complete: function(){
				
			},
			error: function(){
				alert('มีข้อผิดพลาด โปรดติดต่อผู้ดูแลระบบ');
			}
		});
		
	});	
}); //document.ready

function calculate_date(end_date, age)
{
	return calculated_date = moment(end_date, "DD/MM/YYYY").add('days', age).format('DD/MM/YYYY');
	
}
	
function isAutoID(x) { return Math.floor(x) === x; }


	

	

