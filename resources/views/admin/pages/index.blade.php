@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<form class="I-form_input" method="post" action="{{ route('pages.update') }}">
	@csrf
		<div class="layout_wrapper_02">
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Chỉnh Sửa Về Chúng Tôi
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_form">

								<textarea class="summernote" name="about_us" style="min-height: 200px;" required=""><?php echo $data->about_us ?></textarea>
								<script>
								    $(document).ready(function() {
								        $('.summernote').summernote();
								    });
								</script>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Cập Nhật</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="layout_wrapper_02">
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Chỉnh Sửa Liên Hệ
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_form">

								<textarea class="summernote" name="contact" style="min-height: 200px;" required=""><?php echo $data->contact ?></textarea>
								<script>
								    $(document).ready(function() {
								        $('.summernote').summernote();
								    });
								</script>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Cập Nhật</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script src="{{ asset('js/library.js') }}"></script>
				
@endsection()