<table width="100%">
<tr>
	<td width="5%"><strong>Filters: </strong></td>
	
	<td width="15%"> 
		<select  id="clients" class="selectbox">
			<option value=0> Select Client</option>
			
			<?php   foreach($clients as $client) {

				$html =  '<option value='.$client['Client']['client_id'].'>';
				$html.=$client['Client']['client_name'];
				$html.= '</option>';
				echo $html;
			}
			 ?>
		</select>
	</td> 

	<td>

		<select  id="products" class="selectbox">
			<option value=0> Select Product</option>
			
			
		</select>
	</td>
	<td>
		<select id="relativedate" class="selectbox">
			<?php   foreach($global_relativedate as $relativkey=>$relativedate) {

				$html =  '<option value='.$relativkey.'>';
				$html.=$relativedate;
				$html.= '</option>';
				echo $html;
			}
			 ?>
		</select>
	</td>

	<td>		<input type="button" value="Filter" id="filter" /> <span id="loader"></span></td>
</tr>
<tr>

	<td colspan=6>
		<table witdh="60%" id="listing">
			<thead>
	<tr>

		<td width="10%"><strong>Invoice Num</strong></td>
		<td width="10%"><strong>Invoice Date</strong></td>
		<td width="10%"><strong>Product</strong></td>
		<td width="10%"><strong>Qty</strong></td>
		<td width="10%"><strong>Price</strong></td>
		<td width="10%"><strong>Total</strong></td>
	</tr>
	</thead>
	<tbody></tbody>
	

</table>
	</td>
</tr>

</table>


<script>
$(document).ready(function(){
	

	// for invoice section
	$("#filter").click(function(){

		if($("#relativedate").val() > 0) {
			$("#loader").html("Please wait..."); // loader start

			var dataurl = "<?php echo $this->Html->url(array('action' => 'getData'));  ?>" ;
		
			// fire ajax for getting record for invoice
				$.ajax({
		        type: 'POST',
		        url: dataurl,
		        data: {filter: $("#relativedate").val(),client_id: $("#clients").val(),product_id:$("#products").val()},
		        success:function(response){
		        	
		            //$(html).insertAfter("#listing tr");
		      
		        	var tmp = JSON.parse(response);
		        	//console.log(tmp.data);return false;
		        	
		        	var html='';
		         	$.each(tmp.data, function(i, item) {
		         		
		               		var total = (item.InvoiceItem.qty * item.InvoiceItem.price).toFixed(2);;
		                 html+='<tr id="dislayresults"><td width="10%">'+item.Invoice.invoice_num+'</td><td width="10%">'+item[0].invoice_date+'</td><td width="10%">'+item.Product.product_description+'</td><td width="10%">'+item.InvoiceItem.qty+'</td><td width="10%">'+item.InvoiceItem.price+'</td><td width="10%">'+total+'</td></tr>';
		            });

		         	   $("#listing tbody").html(html);
		         	

		        },
		        error:function(){
		            alert("wrong way");
		        },
		    });

			$("#loader").html(""); // loader end
		}

	}); // end invoice section


	$("#clients").on('change', function() {

			var dataurl = "<?php echo $this->Html->url(array('controller'=>'Products','action' => 'getData'));  ?>" ;
			$.ajax({
		        type: 'POST',
		        url: dataurl,
		        data: {filter: $(this).val()},
		        success:function(response){
		        	
		            //$(html).insertAfter("#listing tr");
		      
		        	var tmp = JSON.parse(response);
		        	//console.log(tmp.data);return false;
		        	
		        	var html='<option value=all>All Products </option>';
		         	$.each(tmp.data, function(i, item) {
		               		
		                 html+='<option value='+item.Product.product_id+'>'+item.Product.product_description+'</option>';
		            });

		         	   $("#products").html(html);
		         	

		        },
		        error:function(){
		            alert("wrong way");
		        },
		    });


	}); // end of function


});	
</script>