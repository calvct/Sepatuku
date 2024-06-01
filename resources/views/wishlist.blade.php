@section("title", "Sepatuku Cart")
@extends("template.main")
@section("body")
  <!-- Start Banner Area -->
  <section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Wishlist</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="/wishlist">Wishlist</a>
                </nav>
            </div>
        </div>
    </div>
</section>
@if(isset($dataWishlist) && count($dataWishlist) > 0)
<!-- End Banner Area -->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- PRODUK WISHLIST DRI DATABASE --}}
                        @foreach ($dataWishlist as $wishlist)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{ $wishlist->IMAGE }}" style="width: 100px; height:100px; object-fit:cover;" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $wishlist->NAMA_PRODUK }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>Rp {{ number_format($wishlist->HARGA, 0, ',', '.') }}</h5>
                            </td>

                            <td>
                                <a class="delete" href="/wishlist"><span class="ti-trash wishlist-trash" data-route="{{ route('deleteWishlist') }}"data-id="{{ $wishlist->PRODUK_ID }}"></span></a>
                            </td>
                        </tr>
                        @endforeach
                        {{-- PRODUK WISHLIST DRI DATABASE --}}
                        <tr class="out_button_area">
                            <td>
                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner float-right d-flex align-items-center">
                                    <a class="primary-btn" href="/shop">Continue Shopping</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@else
<section class="cart_area">
    <div class="container">
        <div class="cart_inner text-center"> <!-- Add text-center class to center align the content -->
            <h1>Wishlist is Empty</h1>
            <br>
            <h4>Find your shoes here</h4>
            <div class="checkout_btn_inner d-flex align-items-center justify-content-center"> <!-- Add justify-content-center class to center align the button -->
                <a class="gray_btn" href="/shop">Continue Shopping</a>
            </div>
        </div>
    </div>
</section>
@endif
<!--================End Cart Area =================-->

@endsection
