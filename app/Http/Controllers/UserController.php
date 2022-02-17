<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Role;
use App\Models\Store;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::paginate(6);
        $roles = $this->fetchRoles();

//        dd($stores);
        return view('auth.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->fetchRoles();
        return view('backend.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//    dd($request->all());
        $image_path = '';


        $messages = array(
            'roles.required' => 'Please select atleast one role checkbox',
        );
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'contact' => 'required',
                'image' => 'nullable',
                'ip' => 'nullable',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'country' => 'required',
                'roles' => 'required',
            ],
            $messages


        );

        $roles = array();
        foreach ($request->roles as $key => $value) {
            $roles[] = "" . $key . "";
        }
//    dd($roles);
//        dd($request->all());
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('users', 'public');
        }


        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'country' => $request->country,
            'ip' => $request->ip ,
            'status' => 1,
            'password' => bcrypt($request->password),
            'image' => isset($image_path) ? $image_path : 'logo.png',
        ]);


        if ($user) {

            $user->role()->attach($roles);
            return back()->with('success', 'User Added Successfully');
        }



    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//          dd($user->storeUser->store_id);

        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'contact' => 'required',
                'image' => 'nullable',
                'email' => 'required',
                'country' => 'required',
                'password' => 'nullable',
                'ip' => 'nullable',
                'roles' => 'required',
            ]);

        // to get key name from roles array..!!!
        $roles = array();
        foreach ($request->roles as $key => $value) {
            $roles[] = "" . $key . "";
        }
//        dd($request->all());
        // inserting user
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->contact = $request->contact;
        $user->country = $request->country;
        $user->country = $request->ip;
        $user->status = $request->status ?? $user->status;

        $user->email = $request->email ?? $user->email;
        $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($user->image) {
                Storage::delete($user->image);
            }
            // Store image
            $image_path = $request->file('image')->store('users', 'public');
            // Save to Database
            $user->image = $image_path;
        }
        $result = $user->save();
//          dd($result);
        if ($result) {
            $user->role()->detach();
            $user->role()->attach($roles);
            return back()->with('success', 'User Updated Successfully');
        }
    }

    public function profile()
    {
        return view('auth.profiles.edit');
    }

    public function userUpdate(Request $request)
    {
//          dd($user->storeUser->store_id);

        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'contact' => 'required',
                'image' => 'nullable',
                'email' => 'required',
                'country' => 'required',
                'password' => 'nullable',
            ]);

        // to get key name from roles array..!!!
        $user = User::find(auth()->user()->id);
//        dd($request->all());
        // inserting user
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->contact = $request->contact;
        $user->country = $request->country;
        $user->ip = $request->ip;
        $user->status = $request->status ?? $user->status;
        $user->email = $request->email ?? $user->email;
        $user->password = (isset($request->password)) ? bcrypt($request->password) : $user->password;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($user->image) {
                Storage::delete($user->image);
            }
            // Store image
            $image_path = $request->file('image')->store('users', 'public');
            // Save to Database
            $user->image = $image_path;
        }
        $result = $user->save();
//          dd($result);
        if ($result) {

            return back()->with('success', 'User Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if ($user->delete()) {
            return back()->with('success', 'User Deleted Successfully');
        }
    }

    public function block(User $transaction)
    {

//             dd($transaction);

        DB::beginTransaction();
        try {

            $transaction->update([
                'status' => 0,
            ]);

            DB::commit();
            return redirect()->route('home')->with('success', 'Success, This Clients Blocked Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sorry, There a problem While Blocking This Clients.');

        }
    }


    public function unblock(User $transaction)
    {

//             dd($transaction);

        DB::beginTransaction();
        try {

            $transaction->update([
                'status' => 1,
            ]);

            DB::commit();
            return redirect()->route('home')->with('success', 'Success, This Clients Unblocked Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sorry, There a problem While Unblocking This Clients.');

        }
    }

    public function fetchRoles()
    {
        return Role::all();
    }


}