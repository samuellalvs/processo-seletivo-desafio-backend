<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfer;

class TransferController extends Controller
{
    public function doTransfer(Request $request){
        
        

        $new_transfer = new Transfer;
        $new_transfer->user_sender_id = $request->auth()->user;
        $new_transfer->user_beneficiary_id = 
        $new_transfer->amount
    }
}
