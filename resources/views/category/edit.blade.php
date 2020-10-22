@extends('app.template')
@section('content')
<div class="container">
	<form action="{{route('category.update',$id)}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<div class="row form-group">
			<div class="col-md-12"><h2>Create Category</h2></div>
		</div>
		<div class="card" style="padding: 20px;">
			<div class="row form-group">
				<div class="col-md-2">Name:</div>
				<div class="col-md-6"><input type="text" class="form-control" name="name" required value="{{$ecategory->name}}"></div>
			</div>
			<div class="row form-group">
				<div class="col-md-2">Photo:</div>
				<div class="col-md-6">
					<img src="{{url($ecategory->img)}}" width="100px" alt="">
					<input type="hidden" value="{{$ecategory->img}}" name="old_photo">
					<input type="file" class="form-control" name="new_img">
				</div>
			</div>
			<div class="row text-center">
				<input type="submit" class="btn btn-primary" value="Update">
			</div>
		</div>
	</form>
</div>
@endsection
