@if (count($errors) > 0)
<div class=" alert-danger">
	<strong>xảy ra lỗi!</strong> vui lòng kiểm tra lại.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif