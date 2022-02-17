<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountStoreRequest;
use App\Models\AccountType;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index() {

        $accounts = Account::latest()->simplepaginate(30);

        $accountTypes = $this->fetchAccountType();

        return view('Accounts.index',compact('accounts','accountTypes'));
    }




    public function store(AccountStoreRequest $request) {

      // Generate random IP address
        try {
            $accN = random_int(10000, 999999);
        } catch (\Exception $e) {
            return $e;
        }


//       Start Transaction
        DB::beginTransaction();
        try {

            // inserting into Account table
           Account::create([
                'accountType_id' => $request->accountType_id,
                'amount' => $request->amount ?? 0.00,
                'status' => 1,
                'accountNumber' => 'MG'.$accN ,
                'user_id' => auth()->id()
            ]);

            DB::commit();
            return redirect()->route('account.index')->with('success', 'Success, you Accounts have been Created.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sorry, there a problem while creating Accounts.');

            }
            //throw $th;



    }



    public function update(Request $request, Account $account) {


        $request->validate([
            'accountType_id' => 'required',
            'amount' => 'required|numeric|max:2147483647',
        ]);

        $account->update([
            'accountType_id' => $request->accType_id,
            'amount' => $request->amount,
            'status' => $account->status,
            'accountNumber' => $request->accNumber,
            'user_id' => $account->user_id
        ]);

        if (!$account) {
            return redirect()->back()->with('error', 'Sorry, there a problem while Updating Accounts.');
        }
        return redirect()->route('exp.index')->with('success', 'Success, you Accounts have been Updated.');

    }


    public function destroy(Account $account) {

//         dd($expense);
        $account->delete();

        if (!$account) {
            return redirect()->back()->with('error', 'Sorry, there a problem while Deleting Accounts.');
        }
        return redirect()->route('exp.index')->with('success', 'Success, you Accounts have been Deleting.');

    }

    public function fetchAccountType(){

        $accountTypes = AccountType::orderBy('name')->get();

        return $accountTypes;
    }

}
