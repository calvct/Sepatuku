@section("title", "Sepatuku Cart")
@extends("template.main")
@section("body")
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>History</h1>
                    <nav class="d-flex align-items-center">
                        <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="/history">History</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <section class="cart_area">
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <!--================ Foreach dri Database =================-->
                    @php
                    $count = 1;
                    @endphp
                    @foreach ($historyData as $data)

                    <div class="card-header d-flex justify-content-between align-items-center" id="heading{{$count}}">
                        <h4 class="mb-0">
                            <span>{{$data->TANGGAL}}</span> Order ID: {{$data->ORDER_ID}}<br>
                            Total: Rp {{number_format($data->TOTAL_HARGA, 0, ',', '.')}}
                        </h4>
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$count}}" aria-expanded="true" aria-controls="collapse{{$count}}" style="border: none; background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%); color: #fff; border-radius : 8px; width: 100px; height:40px; font-size:14pt;">
                            Detail
                        </button>
                    </div>
                    
                    <div id="collapse{{$count}}" class="accordion-collapse collapse collapse" aria-labelledby="heading{{$count}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                
                                                <th scope="col" class="text-left">Product</th>
                                                <th scope="col">Size</th>
                                                
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($details[$data->ORDER_ID] as $detail)
                                            @php
                                            $nameStrip = str($detail->NAMA_PRODUK)->replace(' ', '-');
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <div class="d-flex">
                                                            <a href="{{ url("/product-details/{$detail->PRODUK_ID}-{$nameStrip}")}}">
                                                            <img src="/{{$detail->IMAGE}}" alt="" style="width: 100px; height:100px; object-fit:cover;">
                                                            </a>
                                                        </div>
                                                        <div class="media-body text-left">
                                                            <h5>{{ $detail->NAMA_PRODUK }}</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5>{{ $detail->UKURAN }}</h5>
                                                </td>
                                                <td >
                                                    <h5>{{ $detail->JUMLAH }}</h5>
                                                </td>
                                                <td>
                
                                                    <h5>Rp {{ number_format($detail->TOTAL, 0, ',', '.') }}</h5>
                                                </td>
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>
                    @php
                    $count++;
                    @endphp
                    @endforeach
                    <!--================ Foreach dri Database =================-->
                </div>
            </div>
        </div>
    </section>
    
        
    
</body>
@endsection