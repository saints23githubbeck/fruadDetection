<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $roles = Role::paginate(6);
        $permissions = $this->fetchPermissions();
        return view('roles.index',compact('roles','permissions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function fetchPermissions()
    {
        $permissions = Permission::all();
        return $permissions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->fetchPermissions();
        return view('roles.index',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd(request()->permission);
        $request->validate([
            'role' => 'required|unique:roles,name',
            'permission'=>'required'
        ]);

        $permissions = permissions_filter($request->permission); //replace on with true in permission array

        $result = Role::create([
            'name' => $request->get('role'),
            'permissions' => $permissions


        ]);


        if($result)
        {
            return back()->with('success','Role Added Successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = $this->fetchPermissions();
        return view('roles.create',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

        if($role->name == $request->role)
        {
            $validation = 'required';

        }
        else
        {
            $validation = 'required|unique:roles,name';
        }
        $request->validate(['role' => $validation,'permission'=>'required']);

        $role->name = $request->role;
        $role->permissions = permissions_filter($request->permission);
        $result = $role->update();

        if($result)
        {
            return back()->with('success','Role Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->delete())
        {
            return back()->with('success','Role Deleted Successfully');
        }
    }
}
