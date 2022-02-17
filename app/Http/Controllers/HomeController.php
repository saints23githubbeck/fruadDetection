<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $transactions = Transaction::orderBy('created_at','desc')->simplepaginate(10);


        return view('home',compact('transactions'));
    }


}
