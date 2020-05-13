
<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" href="{{ asset('user/css/bootstrap3.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style-overview.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
		<script src="{{ asset('user/js/jquery-3.4.1.min.js') }}"></script>
	</head>
	<body> 
		<header>
			<div class="wrapper">
				<div class="I-header flexY">
					<div class="open_nav">
						<div class="open_nav_button">
							<i class="fas fa-bars"></i>
						</div>
					</div>
					<div class="sub_nav">
						<div class="search_wrapper">
							<input type="" name="">
							<a href="#" class="flex"><i class="fas fa-search"></i></a>
						</div>
						<div class="user_wrapper">
                        	@guest
								<a href="{{ route('customer.login') }}">Đăng Nhập</a>
                        	@else
								<a href="">Thông Tin Cá Nhân</a>
								<a href="">Lịch Sử Giao Dịch</a>
								<a data-toggle="modal" data-target="#logout">
	                                Đăng Xuất
	                            </a>
                        	@endguest
						</div>
						<div class="nav_wrapper">
							<ul>
								<li><a href="{{ route('customer.index') }}">Trang chủ</a></li>
								<li class="sub_menu_wrapper">
									<a href="/user_category">Sản Phẩm</a>
									<div class="sub_menu">
										<?php foreach ($categories as $key => $category): ?>
											<a href="/user_category/<?php echo $category->id ?>"><?php echo $category->category_name ?></a>
										<?php endforeach ?>
									</div>
									<div class="open_subnav">
										<i class="fas fa-caret-down"></i>
									</div>
								</li>
								<li><a href="#">Về Chúng Tôi</a></li>
								<li><a href="#">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="logo flexY">
						<div class="logo_image">
							<img src="{{ asset('images/logo.png') }}">
						</div>
						<a href="{{ route('customer.index') }}" class="logo_text flexY">
							Khánh Châu
						</a>
					</div>
					<div class="search flex">
						<div class="search_wrapper">
							<input type="" name="">
							<a href="#" class="flex"><i class="fas fa-search"></i></a>
						</div>
					</div>
					<div class="action flexX">
						<div class="action_wrapper">
							<div class="cart_wrapper flexY">
								<a href="/checkout" class="cart">
									<div class="cart_icon flexY">
										<i class="fas fa-shopping-cart"></i>
									</div>
									<div class="cart_value flexY">
										<div class="cart_value_wrapper flex">
											@if ( Session::has('cart') )
												<?php echo $amount_item; ?>
											@else
												0
											@endif
										</div>
									</div>
								</a>
							</div>
							<div class="login_wrapper flexY">
                        		@guest
									<div class="login flex">
										<a href="/customer_login">Đăng Nhập</a>
									</div>
                        		@else
									<div class="user flex">
										<i class="fas fa-user"></i>
										<div class="user_action">
											<div class="username">
												@if(Session::has('customer'))
													<?php echo Session::get('customer')->customer['username'] ?>
												@endif 
											</div>
											<a href="/customer_update">Thông Tin Cá Nhân</a>
											<a href="">Lịch Sử Giao Dịch</a>
											<a data-toggle="modal" data-target="#logout">
				                                Đăng Xuất
				                            </a>
										</div>
									</div>
                        		@endguest
							</div>
						</div>
					</div>
				</div>
				<div class="I-navigarion flexY">
					<ul>
						<li><a href="{{ route('customer.index') }}">Trang chủ</a></li>
						<li class="sub_menu_wrapper">
							<a href="/user_category">Sản Phẩm</a>
							<div class="sub_menu">
								<?php foreach ($categories as $key => $category): ?>
									<a href="/user_category/<?php echo $category->id ?>"><?php echo $category->category_name ?></a>
								<?php endforeach ?>
							</div>
						</li>
						<li><a href="#">Về Chúng Tôi</a></li>
						<li><a href="#">Liên Hệ</a></li>
					</ul>
				</div>
			</div>
		</header>
		<main>
			@yield('body')
		</main>
		<footer>
			<div class="I-footer">
				<div class="wrapper">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
							<div class="footer_item">
								<div class="footer_title">
									Địa Chỉ
								</div>
								<div class="footer_text">
									Thôn 84 -Kim Quan -Thạch Thất - Hà Nội
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
							<div class="footer_item">
								<div class="footer_title">
									Bản Đồ
								</div>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14895.184051896544!2d105.5685479284848!3d21.04084651780793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313459f3cfb1b39f%3A0xcce2cb9865b0388b!2zS2ltIFF1YW4sIFRo4bqhY2ggVGjhuqV0LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1588108922971!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
							<div class="footer_item">
								<div class="footer_title">
									Facebook
								</div>
								<div class="footer_text">
									
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
							<div class="footer_item">
								<div class="footer_title">
									Liện hệ
								</div>
								<div class="footer_text">
									Số Điện Thoại
								</div>
								<div class="footer_text">
									0976 653 666 - 0433 842 595
								</div>
								<div class="footer_text">
									Email
								</div>
								<div class="footer_text">
									congtytnhhkhanhchau@gmail.com
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</body>
	<div id="logout" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	   		<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Bạn muốn đăng xuất ?</h4>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
		      	</div>
		      	<div class="modal-footer">
		        	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" type="button" class="btn btn-success" data-dismiss="modal">Đăng Xuất</a>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		      	</div>
	    	</div>
	  	</div>
	</div>
	<script src="{{ asset('user/js/bootstrap3.js') }}"></script>
	<script src="{{ asset('user/js/effect_custom.js') }}"></script>
</html>


