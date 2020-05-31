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
							Tên Sản Phẩm :
						</div>
						<div class="info_text">
							<?php echo $item->item_name ?>
						</div>
					</div>
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
							@if ( $item->item_discount != 0 )
								<?php echo number_format($item->item_prices - ($item->item_prices  * $item->item_discount / 100)). " đ" ?> 
								<span class="discount"><?php echo number_format($item->item_prices). " đ" ?> </span>
							@else
								<?php echo number_format($item->item_prices). " đ" ?> 
							@endif
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Số Lượng còn
						</div>
						<div class="info_text">
							<?php echo number_format($item->item_amounts). " Sản Phẩm"  ?>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Đã bán ra
						</div>
						<div class="info_text">
							<?php echo number_format($item->item_sell). " Sản Phẩm"  ?>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="info_title">
							Đánh Giá
						</div>
						<div class="info_text">
							<?php echo $calc_allvote ?> / 5
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
							<?php if ($has_item): ?>
								<a class="is-close">Đã thêm</a>
							<?php else: ?>
								<a id_cart="<?php echo $item->id ?>" class="Add_to_cart">Thêm Vào Giỏ Hàng</a>
							<?php endif ?>
						</div>
						<div class="order_item">
							<a href="/checkout">Đặt Hàng</a>
						</div>
					</div>
					<div class="info_wrapper">
						<div class="voting_wrapper">
							<div class="calc_voting">
								<?php for ($i = 5; $i >= 1; $i--): ?>
									<?php if (count($all_vote) != 0): ?>
											<div class="item_vote">
												<div class="text"><?php echo $i ?></div><i class="fas fa-star"></i>
												<div class="bar_chart">
													<div class="bar_line">
														<div class="bar_value" value="<?php echo $detail_vote[$i]['calc'] ?>"> </div>
													</div>
												</div>
												<div class="bar_data">
													<?php echo $detail_vote[$i]['total'] ?>
												</div>
											</div>
									<?php else: ?>
											<div class="item_vote">
												<div class="text"><?php echo $i ?></div><i class="fas fa-star"></i>
												<div class="bar_chart">
													<div class="bar_line">
														<div class="bar_value" value="0"> </div>
													</div>
												</div>
												<div class="bar_data">
													0
												</div>
											</div>
									<?php endif ?>
								<?php endfor ?>
							</div>
							<div class="detail_voting">
                        	@guest
								<div class="is_not_login">
									<a href="{{ route('customer.login') }}">Bạn Cần Đăng Nhập Để Đánh Giá</a>
								</div>
                        	@else
								<div class="is_login">
									<textarea class="comment"></textarea>
									<div class="list_voting">
										<input type="hidden" name="voting" class="voting">
										<input type="hidden" name="item_id" class="item_id" value="<?php echo $item->id ?>">
										<?php for ($i = 0; $i < 5; $i++): ?>
											<?php if ($vote != null): ?>
												<?php if ($i < $vote->item_vote): ?>
													<span><i class="fas fa-star is-active"></i></span>
												<?php else: ?>
													<span><i class="fas fa-star"></i></span>
												<?php endif ?>
											<?php else: ?>
												<span><i class="fas fa-star"></i></span>
											<?php endif ?>
										<?php endfor ?>
									</div>
									<button type="button" class="submit_voting">Gửi Đánh Giá</button>
								</div>
								<div class="is_success">
									Bạn Đã Gửi Đánh Giá Thành Công
								</div>
                        	@endguest
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="subitem_detail">
				<?php echo $item->item_detail ?>
			</div>
			<div class="subitem_comment">
				<?php foreach ($all_comment as $key => $value): ?>
					<div class="comment_item">
						<div class="comment_header">
							<div class="ch_user">
								<i class="fas fa-user"></i><?php echo $value->name ?>
							</div>
							<div class="ch_comment">
								<?php echo $value->comment ?>
							</div>
							<div class="ch_action">
								<div class="text open_recomment">Xem <?php echo $count_comment[$value->id] ?> Câu Trả Lời</div>
                        	@guest
                        	@else
								<div class="text open_form">Trả Lời</div>
                        	@endguest
							</div>
							<div class="ch_recomment">
								<?php foreach ($sub_comment as $k => $v): ?>
									<?php if ($v->comment_id == $value->id): ?>
										<div class="recomment_wrapper">
											<div class="ch_user">
												<i class="fas fa-user"></i><?php echo $v->name ?>
											</div>
											<div class="ch_comment">
												<?php echo $v->sub_comment ?>
											</div>
										</div>
									<?php endif ?>
								<?php endforeach ?>
							</div>
							<div class="ch_action_submit">
								<input type="hidden" name="comment_id" value="<?php echo $value->id ?>" class="comment_id">
								<textarea class="comment"></textarea>
								<button type="button" class="submit_comment">Gửi Phản Hồi</button>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<script src="{{ asset('user/js/add_to_cart.js') }}"></script>
	<script src="{{ asset('user/js/item.js') }}"></script>
	
@endsection()


