@extends('user.layout')
@section('body')

	<div class="I-subitem">
		<div class="wrapper">
			<div class="subitem_content">
				<div class="subitem_image">
					<img src="">
				</div>
				<div class="subitem_info">
					<div class="info_wrapper">
						<div class="info_title">
							Khối Lượng :
						</div>
						<div class="info_text">
							Gạo 1
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Xuất xứ :
						</div>
						<div class="info_text">
							Hà Nội
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Nhãn Hiệu
						</div>
						<div class="info_text">
							Gạo Thơm Hà Nội
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
							100.000 đ
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Số Lượng còn
						</div>
						<div class="info_text">
							10.000
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
				
			</div>
		</div>
	</div>
			

@endsection()


