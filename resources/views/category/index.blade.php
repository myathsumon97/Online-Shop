@extends('app.template')
@section('content')
@include('app.message')
<div class="container">
	<div class="mr-auto my-3">
		<a href="{{route('category.create')}}" class="btn btn-primary" >Create Category</a>
	</div>
	<table class="table table-bordered" style="background-color: #eee;">
		<thead>
			<td width="50px">NO</td>
			<td>Name</td>
			<td>IMG</td>
			<td>Action</td>
		</thead>
		<tbody>
			<?php $i=1; ?>
			@if($all_category ?? '')
				@foreach($all_category ?? '' ?? '' as $all)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$all->name}}</td>
					<td><img src="{{url($all->img)}}" width="100px" alt="product_img"></td>
					<td class="d-flex">
						<a href="{{route('category.edit',$all->id)}}" style="color: #f1f1f1;" class="btn btn-secondary">Edit
						</a>
						<a href="{{url('/category/destroy',$all->id)}}" style="color: #f1f1f1;" class="btn btn-danger ml-4" onclick="return confirm('Are You Sure?')">DELETE
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