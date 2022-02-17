<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountTypeStoreRequest;
use App\Models\AccountType;
use Illuminate\Support\Facades\DB;

class AccountTypeController extends Controller
{
    public function index()
    {

        $accountTypes = AccountType::latest()->simplepaginate(5);
//        dd($accountTypes);
        return view('AccountTypes.index', compact('accountTypes'));
    }

    public function store(AccountTypeStoreRequest $request)
    {

        DB::beginTransaction();
        try {

            AccountType::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => auth()->id()
            ]);
//

            DB::commit();
            return redirect()->route('exp.category.index')->with('success', 'Success, Created.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sorry, there a problem while creating .');


        }

    }

    public function update(AccountTypeStoreRequest $request, AccountType $accountType)
    {


        DB::beginTransaction();
        try {

            $accountType->update([
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => auth()->id()

            ]);
//

            DB::commit();
            return redirect()->route('account.type.index')->with('success', 'Updated Successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('account.type.index')->with('error', 'Data, Invalid.');


        }


    }


    public function destroy(AccountType $accountType)
    {


        DB::beginTransaction();
        try {


            $accountType->delete();
//

            DB::commit();
            return redirect()->route('account.type.index')->with('success', 'Success, Deleted.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('account.type.index')->with('error', 'Can\'t delete beacuse there are Accounts associated with this AccountTypeStoreRequest.');


        }

    }
}
