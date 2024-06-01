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
                            <h2 class="text-white">All Transactions</h2>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th></th>
                            <th>Order Time</th>
                            <th>Total Price</th>
                            <th>Action</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $o)
                        <tr>
                            <td>{{$o->order_id}}</td>
                            <td>{{$o->username}}<td>
                            <td>{{$o->order_time}}</td>
                            <td>Rp {{ number_format($o->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('ShowDetailTransaction', ['id' => $o->order_id]) }}" class="btn btn-light" style="font-family: Arial, sans-serif;">
                                    See Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="clearfix">
                    <div class="hint-text">Showing <b>{{ $order->count() }}</b> out of <b>{{ $order->total() }}</b> entries</div>
                     {{ $order->links() }}
                </div>
            </div>
        </div>


	</section>



<!-- Bootstrap JS and dependencies -->

</body>

@endsection
