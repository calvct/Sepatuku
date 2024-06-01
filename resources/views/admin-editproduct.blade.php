@extends("template.admin-main")
@section("title", "Admin - CRUD")
@section('body')
<body style="background-color:#E2E2E2;">
    <section class="login_box_area section_gap">
        <div class="container ft-40">
            <div id="editProductModal">
                <div class="modal-dialog">
                    <div class="modal-content mt-5">
                        <form action="{{ route('EditProduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Product</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="produkid" name="produkid" value="{{$product->produk_id}}">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $product->nama_produk }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="description" name="description" class="form-control description">{{ $product->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="dropdown">
                                        <button style="width: 340px;" class="btn btn-secondary dropdown-toggle btn-light" type="button" id="category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            @if ($product->kategori_id == 1)
                                                Laki laki
                                            @elseif ($product->kategori_id == 2)
                                                Perempuan
                                            @else
                                                Anak anak
                                            @endif
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <a class="dropdown-item" href="#" id="1" onclick="changeButtonText(this)">Laki laki</a>
                                            <a class="dropdown-item" href="#" id="2" onclick="changeButtonText(this)">Perempuan</a>
                                            <a class="dropdown-item" href="#" id="3" onclick="changeButtonText(this)">Anak anak</a>
                                        </div>
                                        <input type="hidden" id="selected_category_id" name="kategori_id" value="{{ $product->kategori_id }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" id="price" name="price" class="form-control price" value="{{ $product->harga }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Size</label>
                                            @foreach ($dproduct as $d)
                                                <input type="text" class="form-control size" id="size" name="size[]" value="{{ $d->ukuran }}"><br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            @foreach ($dproduct as $d)
                                                <input type="text" class="form-control amount" id="amount" name="amount[]" value="{{ $d->jumlah }}"><br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" id="image" name="image" class="form-control image">
                                    {{ $product->image }}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{route('manageproduct')}}" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    function changeButtonText(element) {
        var newText = element.textContent.trim();
        var dropdownButton = document.getElementById('category');
        dropdownButton.textContent = newText;
        var clickedId = element.id;
        document.getElementById('selected_category_id').value = clickedId;
    }
</script>
@endsection
