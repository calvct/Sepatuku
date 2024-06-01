@section("title", "Sepatuku Cart")
@extends("template.main")
@section("body")
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/cart">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    @if(isset($dataCart) && count($dataCart) > 0)
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Select</th>
                                <th scope="col">Product</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--================ Foreach dri Database =================-->

                                @csrf
                            @foreach ($dataCart as $cart)
                            @php
                                $nameStrip = str($cart->NAMA_PRODUK)->replace(' ', '-');
                            @endphp
                            <tr>

                                <td>

                                    <div class="form-check">
                                        <input class="mx-auto form-check-input cart-checkbox" type="checkbox" value="" id="">
                                      </div>
                                </td>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="{{ url("/product-details/{$cart->PRODUK_ID}-{$nameStrip}")}}">
                                            <img src="/{{ $cart->IMAGE }}" alt="" style="width: 100px; height:100px; object-fit:cover;">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $cart->NAMA_PRODUK }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $cart->UKURAN }}</h5>
                                </td>
                                <td>
                                    <h5>Rp {{ number_format($cart->HARGA, 0, ',', '.') }}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        @php
                                            $stock = DB::table('DETAIL_PRODUK')
                                            ->select('JUMLAH')
                                            ->where('PRODUK_ID', '=', $cart->PRODUK_ID)
                                            ->where('UKURAN','=', $cart->UKURAN)
                                            ->first();
                                        @endphp
                                        <input type="number" style="width:80px" min=1 max= {{$stock->JUMLAH}}  data-id="{{ $cart->PRODUK_ID }}" data-harga = "{{ $cart->HARGA }}" data-size= "{{ $cart->UKURAN }}" data-route="{{ route('updateCart') }}" name="qty" id="sst-{{ $cart->PRODUK_ID }}" maxlength="2" value="{{ $cart->JUMLAH }}" title="Quantity:" class="input-text cart-qty">
                                </div>
                                </td>
                                <td>

                                    <h5 class="totalAmount">Rp {{ number_format($cart->HARGA * $cart->JUMLAH, 0, ',', '.') }}</h5>
                                </td>

                                <td>

                                    <a class="delete" href="/cart"><span class="ti-trash cart-trash" data-id="{{ $cart->PRODUK_ID }}" data-size = "{{ $cart->UKURAN }}" data-route="{{ route('deleteCart') }}" data-price="{{$cart->HARGA}}"></span></a>

                                </td>


                            </tr>
                            @endforeach
                             <!--================ Foreach dri Database =================-->

                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="/shop">Continue Shopping</a>
                                        <a class="primary-btn" data-toggle="modal" data-target="#checkoutModal" id="checkout">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" id ="modalcenter">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="checkoutModalLabel">Checkout Confirmation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 <h5 id = "grandTotal">Grand Total : Rp </h5>
                  <p id="checkoutText">Are you sure to checkout your products?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back to cart</button>
                    @csrf <button type="button" class="btn btn-primary" data-route="{{ route('addOrder') }}">Yes, checkout</button>
                </div>
              </div>
            </div>
          </div>
    </section>
    @else
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner text-center"> <!-- Add text-center class to center align the content -->
                <h1>Shopping Cart is Empty</h1>
                <br>
                <p>Enjoy online shopping at Sepatuku</p>
                <div class="checkout_btn_inner d-flex align-items-center justify-content-center"> <!-- Add justify-content-center class to center align the button -->
                    <a class="gray_btn" href="/shop">Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>
    @endif
    <script>
        $(document).ready(function() {
            // Disable the "Proceed to checkout" button by default
            $('.primary-btn').prop('disabled', true);

            // Listen for changes on the checkboxes
            $('.cart-checkbox').change(function() {
                // If at least one checkbox is selected
                if ($('.cart-checkbox:checked').length > 0) {
                    // Enable the "Proceed to checkout" button
                    $('.primary-btn').prop('disabled', false);

                } else {
                    // Otherwise, disable the "Proceed to checkout" button
                    $('.primary-btn').prop('disabled', true);
                }
            });
            $('#checkout').click(function(){
                var grandtotal = 0;
                var index = 0;
                $('.cart-checkbox:checked').each(function() {
                    var row = $(this).closest('tr');
                    var qty = parseInt(row.find('.cart-qty').val());
                    var price = row.find('.cart-trash').data('price');
                    grandtotal += (price *qty);
                    index++;
                });

                if (index ===0)
                {
                    alert("Please select at least one product to checkout.");
                }
                $("#grandTotal").text("Grand Total : Rp  " + grandtotal.toLocaleString("id-ID"));
            });
    $(".btn.btn-primary").click(function() {
    var selectedProducts = [];
    var route = $(this).data("route");
    // Collect selected product data efficiently
    $('.cart-checkbox:checked').each(function() {
      var row = $(this).closest('tr');
      selectedProducts.push({
        id: row.find('.cart-trash').data('id'),
        size: row.find('.cart-trash').data('size'),
        qty: parseInt(row.find('.cart-qty').val()),
        price: row.find('.cart-trash').data('price')
      });
    });

    if (selectedProducts.length === 0) {
      alert("Please select at least one product to checkout.");
      return false;  // Prevent form submission if no products selected
    }

    // Submit AJAX request with CSRF token and selected products
    $.ajax({
      url: route,  // Replace with your actual route URL
      type: 'POST',
      data: {
        _token: $('meta[name="csrf-token"]').attr("content"),
        products: selectedProducts
      },
      success: function(response) {
        alert("Thank you for shopping at Sepatuku :D !");
        selectedProducts.forEach(element => {
            console.log(element);
        });

        window.location.href = '/cart';
        // Handle successful order submission (e.g., redirect to order confirmation page)
      },
      error: function(xhr) {
       console.error("Error:", xhr.responseText)
        selectedProducts.forEach(element => {
            console.log(element);
        });
        //alert("An error occurred while processing your order. Please try again later.");
      }
    });
  });


        });
        </script>

    <!--================End Cart Area =================-->
</body>
@endsection
