<?php

namespace App\Http\Controllers;



use App\Models\Role;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return response(
                User::all()
            );
        }
        $users = User::latest()->simplepaginate(30);
        $roles = $this->fetchRoles();
        return view('Clients.index')->with('users', $users,'roles',$roles);
    }

    public function fetchRoles()
    {
        return Role::all();
    }

}
