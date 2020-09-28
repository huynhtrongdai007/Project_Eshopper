$(document).ready(function(){
	//form category
	$("#form-category").validate({
		rules:{
			    category_name:{
				required:true
			},
			category_status:{
				required:true
			},
			parent:{
				required:true
			}
		},
		messages:{
			category_name:{
				required:'xin vui long nhap tên category'
		
			},
			category_status:{
				required:'xin vui lòng nhập chọn trạng thái'
			},
			parent:{
				required:'xin vui lòng chọn danh mục con'
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

$("#form-category-post").validate({
	rules:{
		name:{
			required:true
		},
		slug:{
			required:true
		},
		description:{
			required:true
		},
		status:{
			required:true
		}
	},
	messages:{
			name:{
				required:'xin vui long nhap tên chuyên mục bài viết',
			},
			slug:{
				required:'xin vui long nhap tên chuyên mục slug',
			},

			description:{
				required:'xin vui long nhap vào mô tả bài viết',
			},

			status:{
				required:'xin vui lòng chọn status'
			}
		}

});

});