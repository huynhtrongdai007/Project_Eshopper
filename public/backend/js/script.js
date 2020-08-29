$(document).ready(function(){
	$("#form-category").validate({
		rules:{
			category_name:{
				required:true
			
			},
			category_status:{
				required:true
				
			}
			
		},
		messages:{
			category_name:{
				required:'xin vui long nhap tên category',

			},
			category_status:{
				required:'xin vui lòng nhập chọn trạng thái',
			
			}
		}
	});

});