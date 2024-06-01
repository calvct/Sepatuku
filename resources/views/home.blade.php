@section("title", "JUDUL")
@extends("template.main")
@section("body")
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">

							<div class="col-lg-5 col-md-6">
                                @include('Template.alert')
								<div class="banner-content">
									<h1>Welcome to Sepatuku</h1>
									<p>Discover your next favorite pair of shoes in our latest collection! Explore the newest arrivals at Sepatuku and find the perfect style to elevate your footwear game.</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="/shop"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Shop Now</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="/img/banner/banner-img.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h1>Shop Now <br> at Sepatuku!</h1>
									<p>Experience the ultimate in online shopping at Sepatuku. Discover unbeatable deals and convenience with just a click away!</p>
									<div class="add-bag d-flex align-items-center">
										<a class="add-btn" href="/shop"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Shop Now</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="/assets/Air-Jordan-Sunset.webp" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon1.png" alt="">
						</div>
						<h6>Free Delivery</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon2.png" alt="">
						</div>
						<h6>Return Policy</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon3.png" alt="">
						</div>
						<h6>24/7 Support</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img src="img/features/f-icon4.png" alt="">
						</div>
						<h6>Secure Payment</h6>
						<p>Free Shipping on all order</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end features Area -->

	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="/assets/for-sport.png" style="height:191.49px" alt="">
								<a href="img/category/c1.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="/assets/1-1.jpg" style="height:191.78px" alt="">
								<a href="img/category/c2.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="/assets/product-couple.jpg" style="height:191.78px" alt="">
								<a href="img/category/c3.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Product for Couple</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="img/category/c4.jpg" alt="">
								<a href="img/category/c4.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Sneaker for Sports</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="/assets/Adidas-Samba.jpg" style="height:413.9px" alt="">
						<a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Sneaker for Sports</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End category Area -->

	<!-- start product Area -->
	<section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->

		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						<div class="section-title">
							<h1>Latest Products</h1>
							<p>Step into style with our newest sneaker arrivals! Our latest collection features innovative designs, premium materials, and unparalleled comfort. From sleek and sporty to bold and trendy, find the perfect pair to elevate your sneaker game. Shop now and experience the ultimate in fashion and functionality!</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
                    @foreach ($newProduct as $produk)
                    @php
                        $nameStrip = str($produk->NAMA_PRODUK)->replace(' ', '-');
                    @endphp
                    @if (Session::has('ACCOUNT_ID') || isset($_COOKIE['ACCOUNT_ID']))
                    <div class="col-lg-3 col-md-6">
						<div class="single-product">
                            <a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}">
							<img class="img-fluid" src="{{$produk->IMAGE}}" alt="" style="width: 200px; height:150px; object-fit:cover;">
                            </a>
                            <div class="product-details">
								<h6 style="height: 57.56px;">{{ $produk->NAMA_PRODUK}}</h6>
								<div class="price">
									<p style="font-weight: 100;"> Rp {{ number_format($produk->HARGA, 0, ',', '.') }} </p>
								</div>
								<div class="prd-bottom">
									<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Add to cart</p>
									</a>

                                        <a class="social-info">
                                            <span id ="add-wishlist" class="lnr lnr-heart" data-id="{{ $produk->PRODUK_ID }}" data-route="{{ route('addWishlist') }}" ></span>
                                        <p class="hover-text">Wishlist</p>
									    </a>

								</div>
							</div>
						</div>
                        @else
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}">
                                <img class="img-fluid" src="{{$produk->IMAGE}}" alt="" style="width: 200px; height:150px; object-fit:cover;">
                                </a>
                                <div class="product-details">
                                    <h6 style="height: 57.56px;">{{ $produk->NAMA_PRODUK}}</h6>
                                    <div class="price">
                                        <p style="font-weight: 100;"> Rp {{ number_format($produk->HARGA, 0, ',', '.') }} </p>
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">Add to cart</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
					</div>
                    @endforeach

				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						<div class="section-title">
							<h1>Best Sellers</h1>
							<p>Explore our top-selling sneakers, loved by our customers for their exceptional style and comfort. These popular picks combine cutting-edge design with high-performance features, making them must-haves for any sneaker enthusiast. Shop our best sellers now and see why they're everyone's favorites!</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
                    @foreach ($bestProduct as $produk)
                        @php
                        $nameStrip = str($produk->NAMA_PRODUK)->replace(' ', '-');
                        @endphp
					@if (Session::has('ACCOUNT_ID') || isset($_COOKIE['ACCOUNT_ID']))
                    <div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}">
                            <img class="img-fluid" src="/{{$produk->IMAGE}}" alt="" style="width: 200px; height:150px; object-fit:cover;">
                            </a>
                            <div class="product-details">
								<h6>{{ $produk->NAMA_PRODUK }}</h6>
								<div class="price">
                                    <p style="font-weight: 100;"> Rp {{ number_format($produk->HARGA, 0, ',', '.') }} </p>
								</div>
								<div class="prd-bottom">
									<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Add to cart</p>
									</a>
                                    <a class="social-info">
                                        <span id ="add-wishlist" class="lnr lnr-heart" data-id="{{ $produk->PRODUK_ID }}" data-route="{{ route('addWishlist') }}" ></span>
                                    <p class="hover-text">Wishlist</p>
									</a>
								</div>
							</div>
						</div>
					@else
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}">
                            <img class="img-fluid" src="/{{$produk->IMAGE}}" alt="" style="width: 200px; height:150px; object-fit:cover;">
                            </a>
                            <div class="product-details">
								<h6>{{ $produk->NAMA_PRODUK }}</h6>
								<div class="price">
                                    <p style="font-weight: 100;"> Rp {{ number_format($produk->HARGA, 0, ',', '.') }} </p>
								</div>
								<div class="prd-bottom">
									<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">Add to cart</p>
									</a>
								</div>
							</div>
						</div>
						@endif
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->

	<!-- Start brand Area -->
	<section class="brand-area section_gap">
		<div class="container">
			<div class="row">
				<a class="col single-img">
					<img class="img-fluid d-block mx-auto" src="/assets/nike-logo.png" alt="" style="width:100px">
				</a>
				<a class="col single-img">
					<img class="img-fluid d-block mx-auto" src="/assets/adidas-logo.png" alt="" style="width:100px">
				</a>
				<a class="col single-img">
					<img class="img-fluid d-block mx-auto" src="/assets/reebok-logo.png" alt="" style="width:100px">
				</a>
				<a class="col single-img">
					<img class="img-fluid d-block mx-auto" src="/assets/puma-logo.png" alt="" style="width:100px">
				</a>
				<a class="col single-img">
					<img class="img-fluid d-block mx-auto" src="/assets/converse-logo.png" alt="" style="width:100px">
				</a>
			</div>
		</div>
	</section>
	<!-- End brand Area -->


@endsection
