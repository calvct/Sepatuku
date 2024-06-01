<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="/img/sepatuku.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Site Title -->
	<title>Sepatuku</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    {{--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        var $li = $('.nav navbar-nav menu_nav ml-auto li').click(function() {
    $li.removeClass('selected');
    $(this).addClass('selected');
    });
    </script>
    --}}
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/countdown.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script src="{{ asset('js/gmaps.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="/"><img src="/img/sepatuku.png" alt="" style="width: 180px;"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
                    @if (Session::has('ACCOUNT_ID') || isset($_COOKIE['ACCOUNT_ID']))
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                {{-- <li class="nav-item"><a class="nav-link" href="/login">Login</a></li> --}}
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">{{ Session::get('USERNAME') ?? Cookie::get('USERNAME')}}</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">logout</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">history</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item" id="home"><a class="nav-link" href="/">Home</a></li>
                                <li class="nav-item" id="shop"><a class="nav-link" href="/shop">Shop</a></li>                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><input type="hidden"></li>
                                <li class="nav-item" id="cart"><a href="/cart" class="cart"><span class="ti-bag"></span></a></li>
                                <li class="nav-item" id="wishlist"><a href="/wishlist" class="wishlist"><span class="ti-heart"></span></a></li>
                                <li class="nav-item">
                                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                {{-- <li class="nav-item"><a class="nav-link" href="/login">Login</a></li> --}}
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">Account</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="/login">login</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item">
                                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                            </ul>
                        </div>
                    @endif
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="search" class="form-control search" name="search_input" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
    </html>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shopping Page</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="/shop">Shop</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Browse Categories</div>
					<ul class="main-categories">
                        <li class="main-nav-list clearKategori" data-route={{ route('clearFilter') }}><a data-toggle="collapse" aria-expanded="false"> All </a>
                        </li>
                        @foreach ($dataCategories as $kategori)
                           <li class="main-nav-list kategoriShop" data-kategori={{ $kategori->NAMA_KATEGORI }} data-id={{ $kategori->KATEGORI_ID }} data-route={{ route('filterCategory') }}><a data-toggle="collapse" aria-expanded="false">{{ $kategori->NAMA_KATEGORI }}</a>
                            </li>
                        @endforeach
					</ul>
				</div>
				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Product Filters</div>
					<div class="common-filter">
						<div class="head">Brands</div>
							<ul>
								<li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Adidas"><label for="asus">Adidas</label></li>
                                <li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Converse"><label for="micromax">Converse</label></li>
                                <li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Nike"><label for="apple">Nike</label></li>
                                <li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="New Balance"><label for="micromax">New Balance</label></li>
                                <li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Puma"><label for="samsung">Puma</label></li>
                                <li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Reebok"><label for="gionee">Reebok</label></li>
								<li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Skechers"><label for="gionee">Skechers</label></li>
								<li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Under Armour"><label for="samsung">Under Armour</label></li>
								<li class="filter-list" data-route="{{ route('filterBrand')}}" data-brand="Vans"><label for="samsung">Vans</label></li>

							</ul>
                            <div class="head">Price</div>
                            <div class="head">

                                    <div class="form-group mr-2">
                                        <input type="text" class="form-control form-control-sm small-input minPrice" id="rupiah1" placeholder="MIN" style="width: 150px;">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm small-input maxPrice" id="rupiah2" placeholder="MAX" style="width: 150px;">
                                    </div>

                            </ul>
                                <button type="button" class="btn btn-secondary btn-apply" data-route="{{ route('filterPrice', ['minPrice' => 0, 'maxPrice' => 0]) }}" style="padding: 5px 10px; font-size: 12px; margin: 5px;"> Apply </button> </div>

                            <br>
                        </div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
                @if(isset($dataProducts) && count($dataProducts) > 0)
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
					</div>
					<div class="pagination">
						{{ $dataProducts->links() }}
					</div>
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
                        @foreach ($dataProducts as $produk)
                        @php
                            $nameStrip = str($produk->NAMA_PRODUK)->replace(' ', '-');
                        @endphp
                        @if (Session::has('ACCOUNT_ID') || isset($_COOKIE['ACCOUNT_ID']))
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}"> <img class="img-fluid" src="/{{$produk->IMAGE}}" alt=""> </a>
								<div class="product-details">
									<h6 style="height: 57.56px">{{ $produk->NAMA_PRODUK }}</h6>
									<div class="price">
										<h6>Rp {{ number_format($produk->HARGA, 0, ',', '.') }}</h6>
									</div>
									<div class="prd-bottom">
										<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
                                        <a class="social-info">
                                            <span id ="add-wishlist" class="lnr lnr-heart" data-id="{{ $produk->PRODUK_ID }}" data-route="{{ route('addWishlist') }}" ></span>
                                        <p class="hover-text">Wishlist</p> </a>
									</div>
								</div>
							</div>
						</div>
                        @else
                        <div class="col-lg-4 col-md-6">
							<div class="single-product">
								<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}"> <img class="img-fluid" src="/{{$produk->IMAGE}}" alt=""> </a>
								<div class="product-details">
									<h6>{{ $produk->NAMA_PRODUK }}</h6>
									<div class="price">
										<h6>Rp {{ number_format($produk->HARGA, 0, ',', '.') }}</h6>
									</div>
									<div class="prd-bottom">
										<a href="{{ url("/product-details/{$produk->PRODUK_ID}-{$nameStrip}")}}" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">add to bag</p>
										</a>
                                        <a> </a>
									</div>
								</div>
							</div>
						</div>
                        @endif
                        @endforeach
						<!-- single product -->
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
					</div>
					<div class="pagination">
						{{ $dataProducts->links() }}
					</div>
				</div>
				<!-- End Filter Bar -->
                @else
                <div class="container">
                    <div class="text-center"> <!-- Add text-center class to center align the content -->
                        <h1 style="margin:50px;">No Product Found</h1>
                    </div>
                </div>
                @endif
			</div>
		</div>
	</div>

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

    <script>
       var rupiah1 = document.getElementById('rupiah1');
       var rupiah2 = document.getElementById('rupiah2');

       let minPrice=0;
       let maxPrice=0;

		rupiah1.addEventListener('keyup', function(e){
            minPrice = this.value.replace(/\D/g, '');
			rupiah1.value = formatRupiah(this.value, 'Rp. ');
		});

        rupiah2.addEventListener('keyup', function(e){
            maxPrice = this.value.replace(/\D/g, '');
			rupiah2.value = formatRupiah(this.value, 'Rp. ');
		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}


    $(document).ready(function () {
        $(".btn-apply").click(function () {
            if (maxPrice === 0 || minPrice === 0)
            {
                alert('Please fill the minimum/maximum price first');
            } else
            {
                var route = $(this).data("route");
                var token = $('meta[name="csrf-token"]').attr("content");
                $.ajax({
                    url: route,
                    type: "POST",
                    data: {
                        minPrice: minPrice,
                        maxPrice: maxPrice,
                        _token: token,
                    },
                    success: function (response) {
                        alert('SUKSES');
                        window.location.href = `/shop/${minPrice}-${maxPrice}`;

                        // Handle success, e.g., display a success message
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        // Handle errors
                    },
                });
            }

        });
    });
    </script>

