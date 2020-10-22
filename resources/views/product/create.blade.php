@extends('app.template')
@section('content')
<style>
	.kyat {
	  position: absolute;
	  right: 0;
	  padding: 8px 27px;
	}
</style>
<div class="container">
	<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="row form-group">
			<div class="col-md-12"><h2>Create Product</h2></div>
		</div>
		<div class="card" style="padding: 20px;">
			<div class="row form-group">
				<div class="col-md-2">Category Name:</div>
				<div class="col-md-6">
					<select name="category_id" class="form-control" id="">
						@foreach($category as $cate)
						<option value="{{$cate->id}}">{{$cate->name}}</option>
						@endforeach
					</select>
				</div>	
			</div>
			<div class="row form-group">
				<div class="col-md-2">Name:</div>
				<div class="col-md-6"><input type="text" class="form-control" name="name" required></div>
			</div>
			<div class="row form-group">
				<div class="col-md-2">Photo:</div>
				<div class="col-md-6"><input type="file" class="form-control" name="img" required></div>
			</div>
			<div class="row form-group">
				<div class="col-md-2">Price:</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
					  <input type="text" class="form-control" aria-label="" name="price">
					  <div class="input-group-append">
					    <span class="input-group-text">kyat</span>
					  </div>
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-2">Desc:</div>
				<div class="col-md-6"><input type="text" class="form-control" name="desc" required></div>
			</div>
			<div class="row" style="margin-left: 400px;">
				<input type="submit" class="btn btn-primary" value="Save">
			</div>
		</div>
	</form>
</div>
@endsection
