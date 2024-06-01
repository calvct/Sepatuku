<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function ShowCategory(Request $request)
    {
        $search = $request->input('search_input');
        if ($search !== null){
            $dataProducts = DB::table('produk')
            ->select('PRODUK_ID', 'NAMA_PRODUK', 'IMAGE', 'HARGA')
            ->where('NAMA_PRODUK', 'like', '%' . $search . '%')
            ->paginate(9);
        }
        else if (session()->has('KATEGORI_ID')) {
            $id = session('KATEGORI_ID');
            $dataProducts = DB::table('produk')
            ->select('PRODUK_ID', 'NAMA_PRODUK', 'IMAGE', 'HARGA')
            ->where('KATEGORI_ID', '=', $id)
            ->paginate(9);
        } else if (session()->has('BRAND')){
            $brand = session('BRAND');
            $dataProducts = DB::table('produk')
            ->select('PRODUK_ID', 'NAMA_PRODUK', 'IMAGE', 'HARGA')
            ->where('NAMA_PRODUK', 'like', '%' . $brand . '%')
            ->paginate(9);
        }else if(session()->has('MINPRICE') || session()->has('MAXPRICE')){
            $MINPRICE = session('MINPRICE');
            $MAXPRICE = session('MAXPRICE');
            $dataProducts = DB::table('produk')
            ->select('PRODUK_ID', 'NAMA_PRODUK', 'IMAGE', 'HARGA')
            ->where('HARGA', '>=', $MINPRICE)
            ->where('HARGA', '<=', $MAXPRICE)
            ->paginate(9);
        } else{
            $dataProducts = DB::table('produk')
            ->select('PRODUK_ID', 'NAMA_PRODUK', 'IMAGE', 'HARGA')
            ->paginate(9);
        }

        $categories = $this->getCategories();
        $randomProducts = $this->getRandomProducts();
        return view("category", [
            "dataProducts" => $dataProducts,
            "dataCategories" =>  $categories,
            "dataRandomProducts" => $randomProducts
        ]);

    }

    public static function getCategories(){
        $categories = collect(DB::select('select * from kategori'));
        return $categories;
    }

    public function filterCategory(Request $request){
        // CLEAR SEMUA SESSION
        HomeController::clearFilterSession();

        $id = $request->input('id');
        $request->session()->put('KATEGORI_ID', $id);
    }

    public function filterBrand(Request $request){
        // CLEAR SEMUA SESSION
        HomeController::clearFilterSession();

        $brand = $request->input('brand');
        $request->session()->put('BRAND', $brand);
    }

    public static function getRandomProducts(){
        $products = collect(DB::select('select * from vRandomProducts'));
        return $products;
    }

    public function filterPrice(Request $request){
        HomeController::clearFilterSession();

        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $request->session()->put('MINPRICE', $minPrice);
        $request->session()->put('MAXPRICE', $maxPrice);
    }
}
