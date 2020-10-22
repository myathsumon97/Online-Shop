@extends('app.template')
@section('content')
@include('app.message')
<div class="container">
	<div class="mr-auto my-3">
		<a href="{{route('product.create')}}" class="btn btn-primary" >Create Product</a>
	</div>
	<table class="table table-bordered" style="background-color: #eee;">
		<thead>
			<td width="50px">NO</td>
			<td>Category</td>
			<td>Name</td>
			<td>Img</td>
			<td>Price</td>
			<td>Description</td>
			<td>Action</td>
		</thead>
		<tbody>
			<?php $i=1; ?>
			@if($all_product ?? '')
				@foreach($all_product ?? '' as $all)
				<tr>
					<td>{{$i++}}</td>
					<?php $category = DB::table('categories')->where('id',$all->category_id)->first();?>
					@if($category == '')
					<td>-</td>
					@else
					<td>{{$category->name}}</td>
					@endif
					<td>{{$all->name}}</td>
					<td><img src="{{url($all->img)}}" width="100px" alt="product_img"></td>
					<td>{{$all->price}}</td>
					<td>{{$all->desc}}</td>
					<td class="d-flex">
						<a href="{{route('product.edit',$all->id)}}" style="color: #f1f1f1;" class="btn btn-primary">Edit
						</a>
						<a herf="{{route('product.destroy',$all->id)}}" style="color: #f1f1f1;" class="btn btn-danger ml-4" onclick="return confirm('Are You Sure?')">DELETE
						</a>
					</td>
				</tr>
				@endforeach
			@else
			<div class="alert alert-danger">
				There's no new
			</div>
			@endif
		</tbody>
	</table>
</div>
@endsection