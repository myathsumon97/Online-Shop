@extends('app.frontend')
@section('content')
<main>
	<section class="hero">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-12 my-3">
					<div class="categories">
						<div class="categories_all">
							<i class="fa fa-bars"></i>
		                    <span>All departments</span>
		                    <ul>
		                    	@foreach($categories as $cate)
		                    	<li>{{$cate->name}}</li>
		                    	@endforeach
		                    </ul>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-12 my-3">
					<div class="hero__search">
	                    <div class="hero__search__form my-3">
	                        <form action="#">
	                            <div class="hero__search__categories">
	                                All Categories
	                                <span class="arrow_carrot-down"></span>
	                            </div>
	                            <input type="text" placeholder="What do yo u need?">
	                            <button type="submit" class="site-btn">SEARCH</button>
	                        </form>
	                    </div>
	                    <div class="hero__search__phone my-3">
	                    	<div class="icon">
	                    		<a href=""><i class="fa fa-phone" style="padding-top: 7px;"></i></a> 
	                    	</div>

	                        <div class="hero__search__phone__text">
	                            <h5>+95 400999</h5>
	                            <span>support 24/7 time</span>
	                        </div>
	                    </div>
	                    <div class="hero__item set-bg my-3">
	                        <div class="hero__text">
	                            <span>FRUIT FRESH</span>
	                            <h2>Vegetable 100% Organic</h2>
	                            <p>Free Pickup and Delivery Available</p>
	                            <a href="#" class="primary-btn">SHOP NOW</a>
	                        </div>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</section>
	<section class="categories">
		<div class="container">
			<div class="row">
				<div class="col-12 f_product">
					<h2>Featured Product</h2>
				</div>
				<div class="owl-carousel owl-theme mt-5">
					@foreach($categories as $pro)
			        <div class="col-md-3 col-xs-3">
			        	<div class="item">
				        	<img src="{{url($pro->img)}}" class="img-fluid" alt="">
				        	<h4>{{$pro->name}}</h4>
			        	</div>
			        </div>
			        @endforeach
				</div>
			</div>
		</div>
	</section>
	<div class="banner mt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="banner_pic">
						<img src="{{url('img/banner-1.jpg')}}" class="img-fluid" alt="">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="banner_pic">
						<img src="{{url('img/banner-2.jpg')}}" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container my-5">
		 <div class="row" id="all">
		 	<div class="col-12 f_product mb-4">
				<h2>Some Product</h2>
			</div>
				@foreach($f_product as $product)
					@php
						$id = $product->id;
	 					$name = $product->name;
	 					$price = $product->price;
	 					$photo=$product->photo;
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
	                           <a  href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-info btnadd" style="background-color: #7fad39;color: white;">Add To Cart</a>
	                        </div>
						</div>
					</div>
				</div>
			@endforeach
			<div class="col-lg-4" style="text-align: center;justify-content: center;display: flex;width: 50px; height: 50px;margin: auto;">
				<a href="{{url('/product-list')}}" style="text-decoration: none;font-size: 20px;color: #7fad39;font-weight: bold;">All Product ---></a>
			</div>
		</div>
	</div>
	<section class="from_the_blog">
		<div class="container">
			<div class="row">
				<div class="col-md-12 f_product">
					<h2>Form The Blog</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="blog_img">
						<img src="{{url('img/blog-1.jpg')}}" alt="">
					</div>
					<div class="blog_item_text">
						<ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
						</ul>    
						<h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="blog_img">
						<img src="{{url('img/blog-2.jpg')}}" alt="">
					</div>
					<div class="blog_item_text">
						<ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
						</ul>    
						<h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="blog_img">
						<img src="{{url('img/blog-3.jpg')}}" alt="">
					</div>
					<div class="blog_item_text">
						<ul>
                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
						</ul>    
						<h5><a href="#">Cooking tips make cooking simple</a></h5>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<script type="text/javascript">
	$(document).ready(function(){
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
	          	// $.each(mycartobj.itemlist,function(i,v){
	          		
	           //  if(v.id==id){
	           //      hasid=true;
	           //      v.qty++;
		          //   }
		          // })
	          	if(hasid){
		          mycartobj.itemlist.push(item);
		          }
		          else{
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
	          $(".count").html(mycartobj.itemlist.length);
	        }else{
	          $(".count").html(0);
	        }
	      }
		    localStorage.clear();
		})    
</script>
@endsection