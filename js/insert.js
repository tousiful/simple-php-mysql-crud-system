

$(document).ready(function() {
	
	
      $.post( "showAllUser.php", function( data ) {
		$( "#showAllUser_table" ).append( data );
		});
		$('#showTable').on('click',".edit",function(data){
			
		var	u_id = $(this).closest('tr').children('td.u_id').text();
		alert(u_id);
		var	u_name = $(this).closest('tr').children('td.u_name').text();
		alert(u_name);
		var	u_email = $(this).closest('tr').children('td.u_email').text();
		alert(u_email);
		var	u_address = $(this).closest('tr').children('td.u_address').text();
		alert(u_address);
		var	u_class = $(this).closest('tr').children('td.u_class').text();
		alert(u_class);
		var	u_roll = $(this).closest('tr').children('td.u_roll').text();
		alert(u_roll);
		var	u_hobby = $(this).closest('tr').children('td.u_hobby').text();
		alert(u_hobby);
		var	u_gender = $(this).closest('tr').children('td.u_gender').text();
		alert(u_gender);
		$('#name').val(u_name);
		$('#email').val(u_email);
		$('#textarea1').val(u_address);
		$('#user_class').val(u_class);
		$('#roll').val(u_roll);
		//$('#name').val(u_hobby);
		//$('#name').val(u_gender);
		
			
		})
		
		});
 