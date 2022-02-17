<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
//        dd($permissions);
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:permissions,name',
            'description' => 'nullable'
        ]);
//        dd($request->all());
        $result = Permission::create([
            'name' =>$request->name,
            'description' =>$request->description,
            'user_id' =>auth()->id()
        ]);
        if($result)
        {
            return back()->with('success','Permission Added Successfully');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {

       $permission->update([
            'name' =>$request->name,
            'description' =>$request->description,
            'user_id' =>auth()->id()
        ]);
        if($permission->update())
        {
            return back()->with('success','Permission updated Successfully');
        }
    }

    /**

     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if($permission->delete())
        {
            return back()->with('success','Permission deleted Successfully');
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {

        $result = Permission::where('name','like','%'.$request->name.'%')->get();
        return view('backend.permissions.index',compact('result'));
    }
}
