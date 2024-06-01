<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function showHistory(){
        $userID = HomeController::getUserID();
        $historyData = $this->getHistory($userID);
    
        $details = [];
        foreach ($historyData as $data) {
            $orderID = $data->ORDER_ID;
            $details[$orderID] = $this->getDetail(str($orderID));
        }
    
        return view("history", [
            "historyData" => $historyData,
            "details" => $details,
        ]);
    }
    
    
    public function getHistory(int $id)
    {
        $dataHistory = collect(DB::select('CALL pHistory(?)', [$id]));
        return $dataHistory;
    }
    public function getDetail(string $orderid){
        $detailHistory = collect(DB::select("CALL pDETAIL_HISTORY('$orderid')"));
        return $detailHistory;
    }
}