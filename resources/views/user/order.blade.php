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
						        <!-- <th>Stt</th> -->
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
							      	<tr class="list_array_item item_<?php echo $value['data']->id ?>">
								        <!-- <td>{{ $key }}</td> -->
								        <td><?php echo $value['data']->item_name ?></td>
								        <td>
											<div class="calc_item">
												<div class="down_calc">
													<i class="fas fa-caret-left"></i>
												</div>
												<div class="val_calc">
													<?php echo $value['value'] ?>
												</div>
												<div class="up_calc">
													<i class="fas fa-caret-right"></i>
												</div>
												<input type="hidden" name="" class="value_input" value="<?php echo $value['value'] ?>">
											</div>
								        </td>
								        <td><?php echo number_format($value['data']->item_prices) . " Đồng" ?></td>
								        <td><?php echo number_format($value['data']->item_prices * $value['value']) . " Đồng" ?></td>
								        <td><a class="open_remove" data-toggle="modal" data-target="#myModal">Xóa</a></td>
								    	<input type="hidden" name="item[]" value="<?php echo $value['data']->id ?>" class="data_id">
								    	<input type="hidden" name="amount[]" value="<?php echo $value['value'] ?>" class="data_amount">
							      	</tr>
						    	<?php endforeach ?>
							@endif
					    </tbody>
					</table>
					<div class="calc_money">
						<input type="hidden" name="totalPrice" value="<?php echo $total_qty ?>">
						Tổng : <span class="totalPrice"><?php echo number_format($total_qty) . " " ?></span>Đồng
					</div>
					<div class="send_order">
						<button type="submit">Gửi Đơn Hàng</button>
					</div>
				</div>
			</div>
		</form> 
	</div>

	<div id="myModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	   		<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Xác nhận xóa khỏi giỏ hàng</h4>
		      		<input type="hidden" name="" class="id_cart_item">
		      		<input type="hidden" name="" class="amount_cart_item">
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-danger remove_item" data-dismiss="modal">Xóa</button>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Quay Lại</button>
		      	</div>
	    	</div>
	  	</div>
	</div>
	<script src="{{ asset('user/js/order.js') }}"></script>
@endsection()


