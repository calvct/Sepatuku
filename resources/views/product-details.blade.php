@section("title", "JUDUL")
@extends("template.main")
@section("body")

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="/shop">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Product Details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="/{{ $product->IMAGE }}" alt="">
                    </div>
					<div class="s_Product_carousel">
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{ $product->NAMA_PRODUK }}</h3>
						<h2>Rp {{ number_format($product->HARGA, 0, ',', '.') }}</h2>
						<p>{{ $product->DESKRIPSI }}</p>
                        <ul class="list">
							<li><h4> Size </h4></li>
                            <ul>
                                {{-- SIZE DRI DATABASE --}}
                                @foreach ($data as $data)
                                @if ($data->JUMLAH != 0)
                                <button type="button" class="btn btn-size" id="btn-size" data-ukuran ="{{ $data->UKURAN }}" data-jumlah="{{ $data->JUMLAH }}">{{ $data->UKURAN }}</button>
                                @else
                                <button type="button" class="btn disabled btn-size" id="btn-size">{{ $data->UKURAN }}</button>
                                @endif
                                @endforeach
                                {{-- SIZE DRI DATABASE --}}
                            </ul>
                            <li><p class="stock"> </p></li>
						</ul>
						<div class="product_count">
							<h4 for="qty" >Quantity:</h4>
                            <input type="number" style="width:80px" min=1 max=99 name="qty" value="" title="Quantity:" class="input-text prod-qty">

						</div>
						<div class="card_area d-flex align-items-center">
                            @if (Session::has('ACCOUNT_ID') || isset($_COOKIE['ACCOUNT_ID']))
							<a style = "color:white" class="primary-btn add-cart" data-id ="{{ $product->PRODUK_ID }}" data-route="{{ route('addCart') }}">Add to Cart</a>
                            <a class="icon_btn" ><i class="lnr lnr lnr-heart" data-id ="{{ $product->PRODUK_ID }}" data-route="{{ route('addWishlist') }}"></i></a>
                            @else
							<a style = "color:white" class="primary-btn" href="/login">Shop Now</a>
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--================End Single Product Area =================-->


	<!-- Start related-product Area -->
	<section class="related-product-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>You Might Also Like</h1>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="row">
                            {{-- RANDOM PRODUCTS --}}
                            @foreach ($dataRandomProducts as $randomProduct)
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20 d-flex justify-content-center">
                                <div class="single-related-product d-flex">
                                    <a href="#"><img src="/{{ $randomProduct->IMAGE }}" alt="" style="height: 80px"></a>
                                    <div class="desc">
                                        <a href="#" class="title">{{ $randomProduct->NAMA_PRODUK }}</a>
                                        <div class="price">
                                            <h6>{{ $randomProduct->HARGA }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{-- RANDOM PRODUCTS --}}
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>
	<!-- End related-product Area -->

@endsection
