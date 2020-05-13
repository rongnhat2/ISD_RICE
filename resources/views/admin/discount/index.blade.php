@extends('admin.layout')
@section('body')


<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Giảm Giá
					</div>
					<div class="title_side">
						<a href="{{ route('discount.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Hình Ảnh</th>
					        <th>Trạng Thái</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($discount as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>
					        	<div class="discount_image">
					        		<img src="{{ asset($value->image_url) }}">
					        	</div>
					        </td>
					        <td>
					        	<div class="discount_action {{ $value->status ? 'success' : '' }}">
									<a class="I-button update_discount  text_light" value_id="<?php echo $value->id ?>">
										{{ $value->status ? 'Hiển Thị' : 'Tạm Ẩn' }}</a>
					        	</div>
					        </td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>
			
<script src="{{ asset('js/discount.js') }}"></script>	

@endsection()