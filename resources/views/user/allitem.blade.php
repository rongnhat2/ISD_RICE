@extends('user.layout')
@section('body')

	<div class="I-listitem">
		<div class="wrapper">
			<div class="listitem_title">
				<?php echo $text ?>
			</div>
			<div class="listitem_content">
				<?php foreach ($items as $key => $value): ?>
					<div class="I-item">
						<div class="item_wrapper">
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

@endsection()


