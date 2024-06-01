@section("title", "Admin - Trasaction")
@extends("template.admin-main")
@section("body")
<body>

    <section class="login_box_area section_gap">
        <div class="container ft-30">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-white">Detail Transaction</h2>
                        </div>
                    </div>
                </div>
                <table class="table"  cellpadding="0">
                    <thead>
                        <tr>
                            <th colspan="5" class="text-left">
                                ID: {{$id->order_id}} <br>
                                Date: {{ \Carbon\Carbon::parse($id->order_time)->format('d M Y') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product Name</td>
                            <td></td>
                            <td class="text-left">Quantity</td>
                            <td class="text-left">Size</td>
                            <td>Total</td>
                        </tr>
                        @foreach ($cekTrans as $c)
                        <tr>
                            <td><img src="/{{$c->image}}"style="width: 100px; height: auto;"></td>
                            <td>{{$c->nama_produk}}</td>
                            <td class="text-left">{{$c->jumlah}}</td>
                            <td class="text-left">{{$c->ukuran}}</td>
                            <td>Rp {{number_format($c->harga * $c->jumlah , 0, ',', '.') }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="4" class="text-right">Total Price</td>
                            <td>Rp. {{ number_format($result[0]->total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


	</section>



<!-- Bootstrap JS and dependencies -->

</body>

@endsection
