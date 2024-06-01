<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowTransaction(Request $request)
    {
        $query = DB::table('ORDER_TABLE as o')
        ->join('account as a', 'a.account_id', '=', 'o.account_id')
        ->select('o.order_id', 'a.username', 'o.order_time', 'o.total_harga');

        $search = $request->input('search_input');
        if($search !== null){
            $query->where('username','LIKE','%'.$search.'%')
                -> orwhere('order_id','LIKE','%'.$search.'%');
        }
        $order = $query->paginate(5);
        return view('admin-transaction-data',compact('order'));
    }
    public function ShowCatalog(Request $request)
    {
        $query= DB::table('produk')
            ->select('produk_id', 'nama_produk', 'image', 'deskripsi', 'harga');


        $search = $request->input('search_input');
        if($search !== null){
            $query->where('nama_produk','like','%'.$search.'%');
        }

        $products = $query->paginate(5);
        return view('admin-catalog', ['products' => $products]);
    }
    public function AddNewProduct(Request $request)
    {
        //cek nama produk di db
        $checkProduct = DB::table('produk')
        ->select('produk_id','nama_produk')
        ->where('nama_produk', '=',$request->name)
        ->first();

        // Kalau nama produk ga ada di DB masukin ke database
        if ($checkProduct == null) {
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'description' => 'required|min:10',
                'selected_category_id'=>'required',
                'price' => 'required',
                'size' => 'required',
                'amount' => 'required',
                'image'=>'required'
            ]);

            $fileName = time().$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('assets'), $fileName);

            $insertProduk = DB::table('PRODUK')->insert([
                'nama_produk' => $validatedData['name'],
                'deskripsi' => $validatedData['description'],
                'kategori_id' => $validatedData['selected_category_id'],
                'image' => 'assets/'.$fileName,
                'harga' => $validatedData['price'],
            ]);

            $produkId = DB::table('produk')
            ->max('produk_id');

            $insertDetailProduk = DB::table('detail_produk')->insert([
                'produk_id' => $produkId,
                'ukuran' => $validatedData['size'],
                'jumlah' => $validatedData['amount'],
            ]);


            if ($insertProduk && $insertDetailProduk) {
                return redirect('/admin/manageproduct')->with('success', 'New Product Successfuly Added!');
            } else {
                return redirect('/admin/manageproduct')->with('error', 'Error occurred during Adding Product. Please Try Again!');
            }
        }

        // Kalau nama produk ada di DB tinggal masukin size & jumlah
        else {
            $produkId = $checkProduct->produk_id;
            $validatedData = $request->validate([
                'name' => 'required|max:100',
                'size' => 'required',
                'amount' => 'required',
            ]);
            //cek ukurannya udah ada di db ato belum
            $cekUkuran = DB::table('produk')
            ->join('detail_produk', 'produk.produk_id', '=', 'detail_produk.produk_id')
            ->select('ukuran')
            ->where('detail_produk.ukuran', '=',$validatedData['size'])
            ->where('produk.nama_produk',"=",$validatedData['name']);
            // Kalau sizenya ga ada di insert
            if ($cekUkuran->count() == 0)
            {
                $insert = DB::table('detail_produk')->insert([
                    'produk_id' => $produkId,
                    'ukuran' => $validatedData['size'],
                    'jumlah' => $validatedData['amount'],
                ]);
                if ($insert) {
                    return redirect('/admin/manageproduct')->with('success', 'New Size and Amount Successfuly Added!');
                } else {
                    return redirect('/admin/manageproduct')->with('error', 'Error occurred during Adding Product. Please Try Again!');
                }
            }

            // kalau size nya ada di update jumlahnya
            else
            {
                // cek jumlah barang
                $cekjumlahh = DB::table('detail_produk')
                ->select('jumlah')
                ->where('produk_id', '=',$produkId)
                ->where('ukuran',"=",$validatedData['size'])
                ->first();

                //data di db + user input
                $cekjumlah =$cekjumlahh->jumlah + $validatedData['amount'];
                //dd($cekjumlah);
                $update = DB::table('detail_produk')
                ->where('produk_id', $produkId)
                ->where('ukuran', $validatedData['size'])
                ->update([
                    'jumlah' => $cekjumlah,
                ]);

                if ($update) {
                    return redirect('/admin/manageproduct')->with('success', 'New Amount Successfuly Added!');
                } else {
                    return redirect('/admin/manageproduct')->with('error', 'Error occurred during Adding Amount Product. Please Try Again!');
                }
            }
        }
    }
    public function EditProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'kategori_id' => 'required',
            'price' => 'required|numeric',
            'size.*' => 'required|integer',
            'amount.*' => 'required|integer',
        ]);
        //kalau ada image
        if ($request->hasFile('image')) {
            $fileName = time().$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('assets'), $fileName);

            $update = DB::table('PRODUK')
                ->where('produk_id', $request->produkid)
                ->update([
                    'nama_produk' => $validatedData['name'],
                    'kategori_id' => $validatedData['kategori_id'],
                    'deskripsi'=> $validatedData['description'],
                    'harga'=>$validatedData['price'],
                    'image' => 'assets/'.$fileName,
            ]);
            if ($update) {
                return redirect('/admin/manageproduct')->with('success', 'Product has Successfuly edited');
            } else {
                return redirect('/admin/manageproduct')->with('error', 'Error occurred during Edit Product. Please Try Again!');
            }
        }
        // Kalau ga ada image update yang ga pake image
        else {
            $update = DB::table('produk')
                ->where('produk_id', $request->produkid)
                ->update([
                    'nama_produk' => $validatedData['name'],
                    'kategori_id' => $validatedData['kategori_id'],
                    'deskripsi'=> $validatedData['description'],
                    'harga'=>$validatedData['price'],
                ]);

            // Update sizes and amounts
            $sizes = $validatedData['size'];
            if (count($sizes) !== count(array_unique($sizes))) {
                return redirect('/admin/manageproduct')->with('error', 'Make Sure No Duplicate Size!');
            }
            $amounts = $validatedData['amount'];
            $updateSize=true;

            //this is troll but it's work
            DB::table('detail_produk')
            ->where('produk_id', $request->produkid)
            ->delete();

            foreach ($sizes as $index => $size) {
                if($size>0) {
                    $result = DB::table('detail_produk')
                        ->where('produk_id', $request->produkid)
                        ->UpdateorInsert(
                            ['produk_id' => $request->produkid,
                            'ukuran' => $size,
                            'jumlah' => $amounts[$index],
                        ]);
                    if ($result === 0) {
                            $updateSize = false;
                    }
                }
            }

            if ($update || $updateSize) {
                return redirect('/admin/manageproduct')->with('success', 'Product has Successfuly edited');
            } else {
                return redirect('/admin/manageproduct')->with('error', 'Error occurred during Edit Product. Please Try Again!');
            }
        }
    }
    public function ShowEditProduct($id)
    {
        $product = DB::table('produk')
            ->select('produk_id','nama_produk', 'deskripsi', 'harga','image','kategori_id')
            ->where('produk_id', $id)
            ->first();


        $dproduct = DB::table('detail_produk')
                ->select('ukuran', 'jumlah')
                ->where('produk_id', $id)
                ->get();


        return view("admin-editproduct",compact('product', 'dproduct'));
    }

    public function DeleteProduct($id)
    {
        DB::table('detail_produk')
        ->where('produk_id', $id)
        ->delete();

        DB::select('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('produk')
        ->where('produk_id', $id)
        ->delete();
        DB::select('SET FOREIGN_KEY_CHECKS = 1;');
        return redirect()->back()->with('success','item is already delated');

    }

    public function ShowDetailTransaction($id){
        $cekTrans = DB::select("
            SELECT p.nama_produk, p.image, d.jumlah, d.ukuran, p.harga
            FROM detail_order d
            INNER JOIN produk p ON d.produk_id = p.produk_id
            WHERE d.order_id = ?
        ", [$id]);

        $result = DB::select("
        select sum(d.jumlah*p.harga) as total
        from detail_order d, produk p
        where p.produk_id = d.produk_id and d.order_id= ?
        ", [$id]);


        $id=DB::table('order_table')
        ->select('order_id','order_time')
        ->where('order_id', $id)
        ->first();

        return view('admin-seedetail',compact('cekTrans','result','id'));
    }
}
