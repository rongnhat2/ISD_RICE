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
						        <th>Thành Tiền</th>
						        <th>Xóa</th>
					      	</tr>
					    </thead>
					    <tbody>
					      	<tr>
						        <td>John</td>
						        <td>Doe</td>
						        <td>john@example.com</td>
					      	</tr>
					      	<tr>
						        <td>John</td>
						        <td>Doe</td>
						        <td>john@example.com</td>
					      	</tr>
					      	<tr>
						        <td>John</td>
						        <td>Doe</td>
						        <td>john@example.com</td>
					      	</tr>
					    </tbody>
					</table>
					<div class="calc_money">
						Tổng : <span>100.000</span> đ
					</div>
					<div class="send_order">
						<button type="submit">Gửi Đơn Hàng</button>
					</div>
				</div>
			</div>
		</form> 
	</div>

@endsection()


