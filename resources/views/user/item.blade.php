@extends('user.layout')
@section('body')

	<div class="I-subitem">
		<div class="wrapper">
			<div class="subitem_content">
				<div class="subitem_image">
					<img src="{{asset($item->item_image)}}">
				</div>
				<div class="subitem_info">
					<div class="info_wrapper">
						<div class="info_title">
							Khối Lượng :
						</div>
						<div class="info_text">
							<?php echo $item->item_size ?>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Xuất xứ :
						</div>
						<div class="info_text">
							<?php echo $item->resource_name ?>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Nhãn Hiệu
						</div>
						<div class="info_text">
							<?php echo $item->trademark_name ?>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Tiêu Chuẩn
						</div>
						<div class="info_text">
							Đạt Tiêu Chuẩn <i class="fas fa-check-circle"></i>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Đơn Giá
						</div>
						<div class="info_text">
							<?php echo number_format($item->item_prices). " đ" ?> 
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Số Lượng còn
						</div>
						<div class="info_text">
							<?php echo $item->item_amounts. " Sản Phẩm"  ?>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Đã bán ra
						</div>
						<div class="info_text">
							1.000.000 sản phẩm
						</div>
					</div>
					<div class="order_wrapper">
						<div class="calc_item">
							<div class="down_calc">
								<i class="fas fa-caret-left"></i>
							</div>
							<div class="val_calc">
								0
							</div>
							<div class="up_calc">
								<i class="fas fa-caret-right"></i>
							</div>
							<input type="hidden" name="" class="value_input" value="1">
						</div>
						<div class="cart_item">
							<a id_cart="<?php echo $item->id ?>" class="test_ajax">Thêm Vào Giỏ Hàng</a>
						</div>
						<div class="order_item">
							<a href="/demo_ajax">Đặt Hàng</a>
						</div>
					</div>
				</div>
			</div>
			<div class="subitem_detail">
				<?php echo $item->item_detail ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('.test_ajax').on('click',function(){
		// console.log(1)
			let cart_id = $(this).attr('id_cart');
			let cart_amount = $('.value_input').val();
			// console.log(cart_amount)
        	var _token = $('input[name="_token"]').val();

        	// console.log(cart_name)
		    $.ajax({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
		        url: "/demo_ajax",
		        type: "GET",
		        data: {
                    cart_id: cart_id,
                    cart_amount: cart_amount
                },
		        success:function(data){ //dữ liệu nhận về
		        	console.log(data)
		        	$('.cart_value_wrapper').html(data);
			    },
		      	error: function () {
		        	console.log('error')
		      	}
		    })
		});
	</script>
			

@endsection()


