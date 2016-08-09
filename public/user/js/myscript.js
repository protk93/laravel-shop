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
// thêm sản phẩm vào giỏ hàng và show popup.
	$('a.productcart').click(function() {
            /*var qty = 1;
            var id = $(this).attr('id');
            $.ajax({
			url: 'mua-hang/'+id+'/'+qty,
			type: 'GET',
			data: {'qty':qty,'id':id},
		})
		.done(function($data) {
			if($data == 'ok') {
                                $("#myModal").load(location.href + " #myModal>*", "");//reload lại modal mới hiển thị sản phẩm mới add vào
                        	$('#myModal').modal('show');
			} else {
				alert(' ban khong them dc');
			}
		}); */
            
        });
});