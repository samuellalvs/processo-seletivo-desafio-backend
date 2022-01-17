<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\User;

class TransferController extends Controller
{
    public function doTransfer(Request $request){
        $validated = $request->validate([
            'payeeRegistryNumber' => 'numeric|required',
            'amount' => 'numeric|required',
        ]);

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

        if($request->user()->registryNumber === $request->payeeRegistryNumber){
            return response()->json([
                'data' => 'error',
                'message' => 'Você não pode fazer uma transação para si proprio'
            ]);
        }

        $payee_user = User::where([
            ['registryNumber', $request->payeeRegistryNumber]
        ])->first();

        if($payee_user){

            try {
                $notification = json_decode(file_get_contents('http://o4d9z.mocklab.io/notify'));
            } catch (\Throwable $th) {
                return response()->json([
                    'data' => 'error',
                    'message' => 'Ocorreu um erro ao verificar o serviço de notificações'
                ]);
            }

            try {
                $external_authorization = json_decode(file_get_contents('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6'));

            } catch (\Throwable $th) {
                return response()->json([
                    'data' => 'error',
                    'message' => 'Ocorreu um erro de autorização'
                ]);
            }

            if($external_authorization->message === 'Autorizado' && $notification->message === 'Success'){

                $user_payer_bank_balance = $request->user()->bank_balance;
                $user_payee_bank_balance = $payee_user->bank_balance;

                $user_payer_bank_balance->amount -= $request->amount;
                $user_payer_bank_balance->save();

                $user_payee_bank_balance->amount += $request->amount;
                $user_payee_bank_balance->save();

                $new_transfer = new Transfer;
                $new_transfer->user_payer_id = $request->user()->id;
                $new_transfer->user_payee_id = $payee_user->id;
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
