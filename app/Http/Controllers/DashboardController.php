<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TopUp;
use App\Models\Produk;
use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminindex()
    {
        $title = 'Dashboard';
        $users = User::all();
        return view('admin.index',compact('title','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function kantinIndex()
    {
        $title = 'Dashboard';
        $produks = Produk::all();
        return view('kantin.index',compact('title','produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function bankIndex()
    {
        $title = 'Dashboard';
        $customers = User::where('role', 'costumer')->get();
        $wallets =Wallet::all();
        $topup = TopUp::all();
        $withdraw =Withdraw::all();
        $requestTopups =TopUp::where('status', 'menunggu')->get();
        $requestWithdrawals=Withdraw::where('status', 'menunggu')->get();
        return view('bank.index',compact('title','customers', 'wallets','requestTopups','requestWithdrawals', 'topup', 'withdraw'));
    }

    /**
     * Display the specified resource.
     */
    public function customerindex()
    {
        $title = 'Dashboard';
        $wallet = Wallet::where('id_user',auth()->user()->id)->first();
        return view('customer.index',compact('title','wallet'));
    }

   
}
