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
							<input type="hidden" name="" class="value_input">
						</div>
						<div class="cart_item">
							<a class="is-close">Thêm Vào Giỏ Hàng</a>
						</div>
						<div class="order_item">
							<a href="/dathang">Đặt Hàng</a>
						</div>
					</div>
				</div>
			</div>
			<div class="subitem_detail">
				<?php echo $item->item_detail ?>
			</div>
		</div>
	</div>
			

@endsection()


