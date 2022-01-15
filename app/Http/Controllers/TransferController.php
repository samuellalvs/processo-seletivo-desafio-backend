<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\User;

class TransferController extends Controller
{
    public function doTransfer(Request $request){
        
        
        if($request->user()->type === 'lojista'){
            return response()->json([
                'data' => 'error',
                'message' => 'Essa funcionalidade não está disponivel para esse tipo de usuário'
            ]);
        }
        
        if($request->user()->bank_balance->amount < $request->amount){
            return response()->json([
                'data' => 'error',
                'message' => 'Saldo insuficiente para efetuar a transação'
            ]);
        }

        if($request->user()->registryNumber === $request->beneficiaryRegistryNumber){
            return response()->json([
                'data' => 'error',
                'message' => 'Você não pode fazer uma transação para si proprio'
            ]);
        }

        $beneficiary_user = User::where([
            ['registryNumber', $request->beneficiaryRegistryNumber]
        ])->first();

        if($beneficiary_user){

            $external_authorization = json_decode(file_get_contents('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6'));

            if($external_authorization->message === 'Autorizado'){

                $user_sender_bank_balance = $request->user()->bank_balance;
                $user_beneficiary_bank_balance = $beneficiary_user->bank_balance;

                $user_sender_bank_balance->amount -= $request->amount;
                $user_sender_bank_balance->save();

                $user_beneficiary_bank_balance->amount += $request->amount;
                $user_beneficiary_bank_balance->save();

                $new_transfer = new Transfer;
                $new_transfer->user_sender_id = $request->user()->id;
                $new_transfer->user_beneficiary_id = $beneficiary_user->id;
                $new_transfer->amount = $request->amount;
                $new_transfer->save();

                return response()->json([
                    'data' => 'success',
                    'message' => 'A transação foi concluida com sucesso'
                ]);
            } else {
                return response()->json([
                    'data' => 'error',
                    'message' => 'A transação não foi autorizada'
                ]);
            }
        }else{
            return response()->json([
                'data' => 'error',
                'message' => 'O beneficiario da transação não foi encontrado no sistema'
            ]);
        }
    }
}
