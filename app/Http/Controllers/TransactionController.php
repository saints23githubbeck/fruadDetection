<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionStoreRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{


    public function show()
    {

        return view('Transactions.create');
    }


    public function add(Request $request)
    {


        try {
            $ip = random_int(10000, 888888);
        } catch (\Exception $e) {
            return $e;
        }

        DB::beginTransaction();
        try {

            Transaction::create([
                'user_id' => $request->user()->id,
                'account_id' => $request->user()->account->id,
                'amount' => $request->amount,
                'country' => $request->country,
                'ip' => $ip,
            ]);

            DB::commit();
            return redirect()->route('home')->with('success', 'Success, you Accounts have been Created.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sorry, there a problem while creating Accounts.');

        }
        //throw $th;


    }


    public function destroy(Transaction $order)
    {

        $order->delete();

        return redirect()->back()->with('error', 'Amount Updated');
    }
}
