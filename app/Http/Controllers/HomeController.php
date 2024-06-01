<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function ShowHome()
    {
        HomeController::clearFilterSession();

        $newestProducts = $this->newestProducts();
        $bestSellling = $this->bestSellingProducts();
        return view("home",[
            "newProduct" => $newestProducts,
            "bestProduct"=> $bestSellling
        ]);
    }
    public function ShowProductDetails(string $id)
    {
        HomeController::clearFilterSession();

        $randomProducts = CategoryController::getRandomProducts();
        $dataProduct = $this->getProduct($id);
        $product = $dataProduct->first();
        return view("product-details", [
            "data" => $dataProduct,
            "product" => $product,
            "dataRandomProducts" => $randomProducts
        ]);
    }

    public static function getUserID()
    {
        if (session()->has('ACCOUNT_ID')) {
            $id = session()->get('ACCOUNT_ID');
        } else if (Cookie::get('ACCOUNT_ID') != null) {
            $id = Cookie::get('ACCOUNT_ID');
        }

        return $id;
    }

    private function newestProducts()
    {
        $newestProducts = collect(DB::select('select * from vLATEST'));
        return $newestProducts;
    }

    private function bestSellingProducts()
    {
        $bestSellling = collect(DB::select('select * from vBEST_SELLING'));
        return $bestSellling;
    }

    private function getProduct(string $id)
    {
        $dataProduct =  DB::table('PRODUK')->select('PRODUK.PRODUK_ID', 'PRODUK.NAMA_PRODUK','PRODUK.HARGA', 'PRODUK.IMAGE', 'PRODUK.DESKRIPSI', 'DETAIL_PRODUK.UKURAN', 'DETAIL_PRODUK.JUMLAH')
                                            ->join('DETAIL_PRODUK','PRODUK.PRODUK_ID','=','DETAIL_PRODUK.PRODUK_ID')
                                            ->where('PRODUK.PRODUK_ID', '=', $id);
        return $dataProduct->get();
    }



    public function addWishlist(Request $request)
    {
        $userID = HomeController::getUserID();
        $wishlist = DB::table('WISHLIST')
            ->select('WISHLIST_ID')
            ->where('ACCOUNT_ID', '=', $userID)
            ->first();
        if ($wishlist) {
            $wishlistID = $wishlist->WISHLIST_ID; // Access the wishlist ID property
            $id = $request->input('id');

            $checkDuplicate = DB::table('detail_wishlist')
                            ->select('WISHLIST_ID')
                            ->where('WISHLIST_ID', '=', $wishlistID)
                            ->where('PRODUK_ID', '=', $id)
                            ->count();
            if ($checkDuplicate == 0) {
                $insert = DB::table('detail_wishlist')
                    ->insert([
                        'WISHLIST_ID' => $wishlistID,
                        'PRODUK_ID' => $id
                    ]);
                    if ($insert) {
                        return response()->json(['success' => true, 'message' => 'Item added to wishlist successfully']);
                    } else {
                        return response()->json(['success' => false, 'message' => 'Insert failed']);
                    }
            }
             else {

                $delete = DB::table('detail_wishlist')
                ->where('WISHLIST_ID', '=', $wishlistID)
                ->where('PRODUK_ID', '=', $id)
                ->delete();
                if ($delete) {
                    return response()->json(['success' => true, 'message' => 'Deleted from wishlist']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Delete failed']);
                }
            }
        }
    }

    public static function getWishlistId()
    {
        $userID = HomeController::getUserID();
        $wishlistID = DB::table('WISHLIST')
        ->select('WISHLIST_ID')
        ->join('ACCOUNT', 'ACCOUNT.ACCOUNT_ID', '=', $userID)
        ->get();

        return $wishlistID;
    }
    public static function search(Request $request)
    {
        HomeController::clearFilterSession();

        $search = $request->input('search_input');
    }

    public static function clearFilterSession() // UNTUK HAPUS SESSION FILTER SHOP
    {
        session()->pull('KATEGORI_ID'); // PENTING !! BUAT HAPUS KATEGORI SUPAYA G NGEBUG
        session()->pull('BRAND');// PENTING !! BUAT HAPUS BRAND SUPAYA G NGEBUG
        session()->pull('MINPRICE');
        session()->pull('MAXPRICE');
        session()->pull('SEARCH');
    }
}
