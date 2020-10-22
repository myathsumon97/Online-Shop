@extends('app.frontend')
@section('content')
<div class="container my-5">
			 <div class="row" id="all">
			 	<div class="col-12 f_product mb-4">
					<h2>All Product</h2>
				</div>
					@foreach($f_product as $product)
						@php
							$id = $product->id;
		 					$name = $product->name;
		 					$price = $product->price;
		 					$photo=$product->img; 
						@endphp
					<div class="col-lg-4">
						<div class="card shadow" style="margin:1em;">
							<a href="{{url($product->img)}}" target="_blank">
								<img src="{{url($product->img)}}" class="card-img-top img-fluid" style="height:17em" ></a>
							<div class="card-body" >
								<h5 class="card-title d-inline-block">{{$product->name}}</h5>
								<span>{{$product->size_id}}</span><br>
								<span>MMK: {{$product->price}}</span><br>
								<div class="input-group my-3 increase">
									 <button  type="button" class="btn btn-info btnadd" style="background-color: #7fad39;color: white;" data-name="<?php echo $name;?>" data-price="<?php echo $price;?>" data-id="<?php echo $id;?>"data-photo="<?php echo $photo;?>">Add To Cart</button>
		                           <!--  <div class="input-group-prepend">
		                                <a class="btn btn-dark btn-sm btnminu" id="minus-btn_{{$product->id}}" data-id="<?php echo $id;?>"><i class="fa fa-minus" style="color: white;"></i></a>
		                            </div>
		                            <input type="text" id="qty_input_{{$product->id}}" class="form-control form-control-sm" value="0" min="0" readonly name="qty_{{$product->id}}">
		                            <div class="input-group-prepend">
		                                <a class="btn btn-dark btn-sm btnadd" id="plus-btn_{{$product->id}}" data-name="<?php echo $name;?>" data-price="<?php echo $price;?>" data-id="<?php echo $id;?>"data-photo="<?php echo $photo;?>"><i class="fa fa-plus" style="color: white;"></i></a>
		                            </div> -->
		                        </div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
			 	<div class="col-12 text-center">
			 		<div class="icon">
	            		<a href="{{url('/add-to-cart')}}" class="btn btn-light" style="text-decoration: none;color: #7fad39; "><i class="fa fa-shopping-cart fa-2x"></i>
	            		<sub class="count">0</sub>
	            		<!-- <b>Add To Cart</b> -->
	            	</a>
	            	</div>
			 	</div>
			</div>
	</div>
	<script type="text/javascript">
		$('.btnminu').click(function(){
			var id=$(this).data('id');
			var qty=$(this).val();
			console.log(qty);
		 	var mycart=localStorage.getItem('mycart');
	        var mycartobj=JSON.parse(mycart);
	        mycartobj.itemlist.splice(id,1);
		 	console.log(mycartobj);

	        localStorage.setItem('mycart',JSON.stringify(mycartobj));
			if ($('#qty_input_'+id).val() == 0) {
	    		$('#minus-btn_'+id).prop('disabled', true);
				$('#qty_input_'+id).val(0);
			}else{
		    
	    		$('#minus-btn_'+id).prop('disabled', false);
				$('#qty_input_'+id).val(parseInt($('#qty_input_'+id).val()) - 1 );

			}
			   	 count_item();
		});
		function delete_id(count){
		      	var id=count;
		      	console.log(id);

			 	var mycart=localStorage.getItem('mycart');
		        var mycartobj=JSON.parse(mycart);
		        mycartobj.itemlist.splice(id,1);
			 	console.log(mycartobj);
		        localStorage.setItem('mycart',JSON.stringify(mycartobj));
	    	
	      }

		 $('.btnadd').click(function(){
				var id=$(this).data('id');
				var name=$(this).data('name');
				var price=$(this).data('price');
				var photo=$(this).data('photo');
				var item={
					id:id,
					name:name,
					price:price,
					photo:photo,
					qty:1,
				}
				var num = parseInt($('#qty_input_'+id).val()) ;
			    $('#minus-btn_'+id).prop('disabled', false);
		    	$('#qty_input_'+id).val(num + 1 );
		     
		    	var mycart=localStorage.getItem('mycart');
				if(!mycart){
		        var mycart='{"itemlist":[]}';
		        }
	           	var mycartobj=JSON.parse(mycart);
	          	var hasid=false;
	          	$.each(mycartobj.itemlist,function(i,v){
	          		
	            if(v.id==id){
	                hasid=true;
	               var count =  v.qty++;
	               console.log(count);
		            }
		          })
	          	if(!hasid){
		          mycartobj.itemlist.push(item);
		          }
		          localStorage.setItem('mycart',JSON.stringify(
		            mycartobj));
		          count_item();
		    })
	
		 function count_item(){
	        var mycart=localStorage.getItem('mycart');
	        if(mycart){
	          var mycartobj=JSON.parse(mycart);  
	          var total_count=0;
	          $.each(mycartobj.itemlist,function(i,v){
						total_count+=parseInt(v.qty);

					});
	          $(".count").html(total_count);
	        }else{
	          $(".count").html(0);
	        }
	      }
	      
    	$('.delete').click(function(){

	  		
	        
	  	})
		    localStorage.clear();
		
</script>
@endsection