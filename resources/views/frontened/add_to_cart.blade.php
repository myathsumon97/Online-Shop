@extends('app.frontend')
@section('content')
<style type="text/css">
	h1{
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.qty{
		border: none;
		width: 40px;
	}
</style>
<div class="d-flex">
	<div class="col-md-10">
		<h1>Your Cart</h1>
	</div>
	<div class="col-md-2">
		<a class="btn btn-info" style="color: white;">Order</a>
	</div>
</div>
<table class="table table-bordered">
	<thead>
		<th>No.</th>
		<th>Photo</th>
		<th>Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Sub Total</th>
		<th>Remove</th>
		
	</thead>
	<tbody></tbody>
</table>
<script type="text/javascript">
		$(document).ready(function(){
			showcart();

			$("tbody").on('change','.qty',function(){
				var id=$(this).data('id');
				var qty=$(this).val();
				console.log(id,'=>',qty);
				var cart=localStorage.getItem('mycart');
				var cartobj=JSON.parse(cart);
				if(qty<1)
				{
					cartobj.itemlist.splice(id,1);
				}
				else{
					cartobj.itemlist[id].qty=qty;
				}
				// console.log(cartobj);
				// cartobj.itemlist[id].qty=qty;
				localStorage.setItem('mycart',JSON.stringify(cartobj));
				showcart();
			})

			showcart();
			$("tbody").on('click','.btndelete',function(){
				var id=$(this).data('id');
				console.log(id);
				var ans=confirm('Are you sure?');
				if(ans){
					var cartjson=localStorage.getItem('mycart');
					var cartjsonobj=JSON.parse(cartjson);
					cartjsonobj.itemlist.splice(id,1);
					localStorage.setItem('mycart',JSON.stringify(cartjsonobj));
				}
				showcart();
			})

			function showcart(){
				var cart=localStorage.getItem('mycart');
				if(cart){
					var cartobj=JSON.parse(cart);
					var total=0;
					var j=1;
					var html='';
					$.each(cartobj.itemlist,function(i,v){
						var id=v.id;
						var name=v.name;
						var photo=v.photo;
						console.log(photo);
						var price=v.price;
						var qty=v.qty;
						var subtotal=qty*price;
						total+=subtotal;
						html+=`<tr><td>${j++}</td>
									<td><img src="./${photo}" width=100 height=100</td>
									<td>${name}</td>
									<td>${price}</td>
									<td><input type="number"  value="${qty}" class="qty" data-id=${i}></td>
									<td>${subtotal}</td>
									<td><button class="btndelete btn btn-danger" data-id=${id}>Delete</button></td>
									</tr>`;
								})
					html+=`<tr><td colspan=6><center>Total</center></td><td colspan=2><center>${total}</center></td></tr>`;
					$("tbody").html(html);
				}

			}

		})
	</script>
@endsection