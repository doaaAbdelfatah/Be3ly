<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
	function getData()
	{
		var e = document.getElementById("cat_id");
		var catid = e.options[e.selectedIndex].value;
		document.getElementById("sub_cat_id").innerHTML = "";
		$.ajax({
			url:'get_data.php',
			type:'POST',
			data : {'id' : catid},
			dataType: 'json',
			success: function( input ) {
				// alert(input);
				$.each(input, function(value, displayed_value) {  				
				   $('<option></option>', {text:displayed_value}).attr('value', value).appendTo('#sub_cat_id');
				});
			}
		  });
	}
</script>
</head>
<body>
	<div class="row">
	  
	  <div class="col-md-4">		
	  <select id="cat_id" onchange="getData()">
		<option value="10">Admin</option>
		<option value="20">Sales</option>
		<option value="30">HR</option>		
	  </select>
	   <select id="sub_cat_id">	
		<option>frist select category </option>	   
	  </select>
	  
	  
	  </div>
	</div>
	

</body>
</html>

