$(document).ready(function(){
	   $('.cart_quantity_up').click(function(e){
        e.preventDefault();
        fieldName = $(this).attr('field');

        //Fetch qty in the current elements context and since you have used class selector use it.
        var qty = $(this).closest('tr').find('.cart_quantity_input');
        //var qty = $(this).closest('tr').find('input[name='+fieldName+']');

        var currentVal = parseInt(qty.val());
        if (!isNaN(currentVal)) {
            qty.val(currentVal + 1);
        } else {
            qty.val(0);
        }

        //Trigger change event
        qty.trigger('change');
    });

    $(".cart_quantity_down").click(function(e) {
        e.preventDefault();
        fieldName = $(this).attr('field');

        //Fetch qty in the current elements context and since you have used class selector use it.
        var qty = $(this).closest('tr').find('.cart_quantity_input');
        //var qty = $(this).closest('tr').find('input[name='+fieldName+']');

        var currentVal = parseInt(qty.val());
        if (!isNaN(currentVal) && currentVal > 1) {
            qty.val(currentVal - 1);
        } else {
            qty.val(1);
        }

        //Trigger change event
        qty.trigger('change');
    });    

    //  $(".cart_quantity_input").change(function() {
    //     var sum = 0;
    //     var total = 0;
    //     $('.price').each(function () {
    //         var price = $(this);
    //         var count = price.closest('tr').find('.cart_quantity_input');
    //          console.log(price);
    //         sum = (price.html() * count.val());
    //         total = total + sum;
           
    //         price.closest('tr').find('.cart_total_price').html(sum + "Đ"); //Also use html() instead of append()
    //     });
    //     $('#total').html(total); 
    //     //Also use html() instead of append()

    // }).change(); //trigger change event on page load 
 });



