@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Danh Mục
					</div>
					<div class="title_side">
						<a href="{{ route('item.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Danh mục</th>
					        <th>Tên</th>
					        <th>Kích Thước</th>
					        <th>Giảm Giá</th>
					        <th>Nguồn Gốc</th>
					        <th>Thương Hiệu</th>
					        <th>Đơn Giá</th>
					        <th>Số Lượng</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($items as $item)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $item->category_name }}</td>
					        <td>{{ $item->item_name }}</td>
					        <td>{{ $item->item_size  }}</td>
					        <td>{{ $item->item_discount }}</td>
					        <td>{{ $item->resource_name }}</td>
					        <td>{{ $item->trademark_name }}</td>
					        <td>{{ $item->item_prices }}</td>
					        <td>{{ $item->item_amounts }}</td>
					        <td>
					        	<a href="{{ route('item.edit', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('item.delete', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-trash-alt"></i>
					        	</a>
					        </td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>
				
@endsection()