@extends('user.layout')
@section('body')

	<div class="I-order">
		<form method="post" action="{{ route('customer.postOrder') }}" enctype="multipart/form-data">
			@csrf
			<div class="wrapper">
				<div class="order_wrapper">
					<table class="table">
					    <thead>
					      	<tr>
						        <th>Stt</th>
						        <th>Sản Phẩm</th>
						        <th>Số Lượng</th>
						        <th>Đơn Giá</th>
						        <th>Thành Tiền</th>
						        <th>Xóa</th>
					      	</tr>
					    </thead>
					    <tbody>
							@if ( Session::has('cart') )
						    	<?php foreach ($item as $key => $value): ?>
							      	<tr>
								        <td>ID</td>
								        <td><?php echo $value['data']->item_name ?></td>
								        <td><?php echo $value['value'] ?></td>
								        <td><?php echo number_format($value['data']->item_prices) . " Đồng" ?></td>
								        <td><?php echo number_format($value['data']->item_prices * $value['value']) . " Đồng" ?></td>
								        <td><a href="">Xóa</a></td>
							      	</tr>
						    	<?php endforeach ?>
							@endif
					    </tbody>
					</table>
					<div class="calc_money">
						Tổng : <span><?php echo number_format($total_qty) . " " ?></span>Đồng
					</div>
					<div class="send_order">
						<button type="submit">Gửi Đơn Hàng</button>
					</div>
				</div>
			</div>
		</form> 
	</div>

@endsection()


