$(document).ready(function(){
	//form category
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
				required:'xin vui long nhap tên category'
		
			},
			category_status:{
				required:'xin vui lòng nhập chọn trạng thái'
			
			}
		}
	});


// form slider

$('#form-slider').validate({
	rules:{
		name:{
			required:true,
		},
		description:{
			required:true
		},
		image:{
			required:true
		},
		status:{
			required:true
		}
	},
	messages:{
			name:{
				required:'xin vui long nhap tên slider',
			},

			description:{
				required:'xin vui long nhap vào mô tả'
			},

			status:{
				required:'xin vui lòng chọn status'
			}


		}
});

var password = $("#password").val();
var cfpass = $("#cfpassword").val();

console.log(password);

});