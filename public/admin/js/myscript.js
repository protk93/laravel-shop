$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true
	});

	$('div.alert').delay(3000).slideUp();
});

function xacnhanxoa(msg) {
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}

$(document).ready(function() {
	$('#addImages').click(function() {
		$('#insert').append('<div class="form-group"><input type="file" name="fproductImg[]"></div>');
	});

	$('a#del_img').on('click', function() {
     var idhinh = $(this).attr('data-id');
     var url = $(this).parent().find('img').attr('data-url');
     var rid = $(this).parent().find('img').attr('id');
     var _token = $("form[name = 'fedit']").find("input[name='_token']").val();
	     $.ajax({
	     	url: url+"/"+idhinh,
	     	type: 'POST',
	     	data: {'idHinh': idhinh,'_token':_token},
	     })
	     .done(function(data) {
	     	if(data == "ok") {
	     		$('#'+rid).remove();
	     	} else {
	     		alert('error');
	     	}
	     	console.log(data);
	     });
	     
	});
});