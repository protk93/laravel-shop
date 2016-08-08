$(document).ready(function() {
	$('.updateCart').click(function() {
		var rowId = $(this).attr('data-idcart');
		var qty = $(this).parent().prev().find('input.qty').val();
		var _token = $("input[name='_token']").val();
		$.ajax({
			url: 'update-gio-hang/'+rowId+'/'+qty,
			type: 'POST',
			data: {'_token': _token,'id':rowId,'qty':qty},
		})
		.done(function($data) {
			if($data == 'ok') {
				alert(' cập nhật giỏ hàng thành công');
				location.reload();
			} else {
				alert(' cập nhật giỏ hàng thất bại');
			}
		});
		
	});

	
});