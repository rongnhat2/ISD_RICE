$('.open_remove').on('click', function(){
	var father = $(this).parent().parent()
	$('.id_cart_item').val(father.find('.data_id').val())
	$('.amount_cart_item').val(father.find('.data_amount').val())
})

$('.list_array_item').each(function( index ) {
    let cart_id = $(this).find('.data_id').val();
    let cart_amount = $(this).find('.data_amount').val();
    $(this).find('.down_calc').on('click', function(){
        // var data = $(this).parent().find('.value_input').val()
        var data = $(this).parent().find('.val_calc').html()
        // console.log(data)
        if (data > 1) {
            data = data - 1;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/UpdateAmount",
                type: "GET",
                data: {
                    cart_id: cart_id,
                    cart_amount: '-1',
                },
                success:function(data){ //dữ liệu nhận về
                    console.log(data)
                    $('.cart_value_wrapper').html(data['qty_cart']);
                    $('.totalPrice').html(format(data['price_cart']));
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            })
        }

        $(this).parent().find('.value_input').val(data)
        $(this).parent().find('.val_calc').html($(this).parent().find('.value_input').val())

    })
    $(this).find('.up_calc').on('click', function(){
        var data = $(this).parent().find('.val_calc').html()
        // var data = $(this).parent().find('.value_input').val()
        data = data - -1;
        $(this).parent().find('.value_input').val(data)
        $(this).parent().find('.val_calc').html($(this).parent().find('.value_input').val())

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/UpdateAmount",
            type: "GET",
            data: {
                cart_id: cart_id,
                cart_amount: '1',
            },
            success:function(data){ //dữ liệu nhận về
                console.log(data)
                $('.cart_value_wrapper').html(data['qty_cart']);
                $('.totalPrice').html(format(data['price_cart']));
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        })
    })


});
// $('.I-order').find('.val_calc').html($('.I-order').find('.value_input').val())


$('.remove_item').on('click',function(){
	let cart_id = $('.id_cart_item').val();
	let cart_amount = $('.amount_cart_item').val();
	var _token = $('input[name="_token"]').val();
	$('.item_'+cart_id).remove();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/Remove_item",
        type: "GET",
        data: {
            cart_id: cart_id,
            cart_amount: cart_amount,
        },
        success:function(data){ //dữ liệu nhận về
        	console.log(data)
        	$('.cart_value_wrapper').html(data['qty_cart']);
        	$('.totalPrice').html(format(data['price_cart']));
	    },
      	error: function (request, status, error) {
        	alert(request.responseText);
      	}
    })
});
function format(x) {
    return isNaN(x)?"":x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}