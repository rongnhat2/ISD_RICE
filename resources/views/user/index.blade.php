@extends('user.layout')
@section('body')
	<div class="I-carousel">
		<div class="wrapper">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">

			  	<ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				    <li data-target="#myCarousel" data-slide-to="3"></li>
			  	</ol>

			  	<div class="carousel-inner">
				    <div class="item active">
				      	<img src="images/banner_05.png">
				    </div>
				    <div class="item">
				      	<img src="images/banner_05.png">
				    </div>
				    <div class="item">
				      	<img src="images/banner_05.png">
				    </div>
				    <div class="item">
				      	<img src="images/banner_05.png">
				    </div>
			  	</div>

			  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
			  	</a>
			  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
			  	</a>
			</div>
		</div>
	</div>

	@if ( $discount_image != null )
		<div class="I-discount">
			<div class="wrapper">
				<div class="discount_wrapper">
					<img src="{{asset($discount_image->image_url)}}">
				</div>
			</div>
		</div>
	@endif
	<div class="I-listitem">
		<div class="wrapper">
			<div class="listitem_title">
				Sản Phẩm Mới
			</div>
			<div class="listitem_content">
				<?php foreach ($items as $key => $value): ?>
					<div class="I-item">
						<div class="item_wrapper">
							<div class="item_banner {{ $value->item_amounts ? '' : 'is-sell' }}">
								Tạm hết
							</div>
							<div class="item_image">
								<img src="{{asset($value->item_image)}}">
							</div>
							<div class="item_title">
								<?php echo $value->item_name ?>
							</div>
							<div class="item_detail">
								<a href="/user_item/<?php echo $value->id ?>">Chi Tiết</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<div class="I-listitem">
		<div class="wrapper">
			<div class="listitem_title">
				Sản Phẩm Bán Chạy
			</div>
			<div class="listitem_content">
				<?php foreach ($items as $key => $value): ?>
					<div class="I-item">
						<div class="item_wrapper">
							<div class="item_banner {{ $value->item_amounts ? '' : 'is-sell' }}">
								Tạm hết
							</div>
							<div class="item_image">
								<img src="{{asset($value->item_image)}}">
							</div>
							<div class="item_title">
								<?php echo $value->item_name ?>
							</div>
							<div class="item_detail">
								<a href="/user_item/<?php echo $value->id ?>">Chi Tiết</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<div class="I-allitem">
		<div class="wrapper">
			<div class="allitem_wrapper">
				<a href="/user_category">Xem Tất Cả Sản Phẩm</a>
			</div>
		</div>
	</div>

@endsection()

