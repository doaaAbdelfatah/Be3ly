<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
	function deleteProduct(productID ,productName)
	{
		var rslt =confirm('Are you sure you want to delete product ' + productName);
		if(rslt == true)
		{
			$.ajax({				
				type : 'POST',
				url  : 'checker.php',
				data : {'id' : productID },
				success: function(rslt){					
					if(rslt =="done"){
					$("#row_" + productID).fadeOut(1000,function(){
						$("#row_" + productID).remove();
					});}
					else{
						alert("Product could not be deleted");
					}
				}
				
			});
		}
	}
</script>
</head>
<body>
	<div class="row">
	  <div class="col-md-8"><h1> Our Products </h1></div>
	  <div class="col-md-4">		
	  </div>
	</div>
	<table class="table">
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>			
			<th>Delete</th>		
		</tr>
		
		<tr id="row_10">
			<th>10</th>
			<th>xxx</th>					
			<th><a  title="Delete Product" onclick="deleteProduct(10,'xxx')">Delete</a></th>
		</tr>
		<tr id="row_20">
			<th>20</th>
			<th>yyy</th>					
			<th><a  title="Delete Product" onclick="deleteProduct(20,'yyy')">Delete</a></th>
		</tr>	
		<tr id="row_30">
			<th>30</th>
			<th>zzz</th>					
			<th><a  title="Delete Product" onclick="deleteProduct(30,'zzz')">Delete</a></th>
		</tr>
	</table>

</body>
</html>
<!-- /*
json
-----
{
	{
		'name'  :'ahmed',
		'salary':5000,
		'job'   :'inst'
	},
	{
		'name'  :'sara',
		'salary':5700,
		'job'   :'inst'
	}
}

--xml
---- -->
<!-- <employees>
	<emp id="1">
		<name>ahmed</name>
		<salary>555</salary>
		<job>sales</job>
	</emp>
	<emp id="2">
		<name>sara</name>
		<salary>666</salary>
		<job>inst</job>
	</emp>

</employees> -->
