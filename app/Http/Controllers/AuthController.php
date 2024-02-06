<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.index');
    }
    public function registerIndex()
    {
        return view('auth.regis');
    }

    /**
     * Show the form for creating a new resource.
     */
 function login(Request $request)
    {
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required',
            ],
            [
                'email.required'=>'Email harus diisi',
                'Password.required'=>'Password harus diisi',
            ]
            
            );
            $infologin =[
                'email'=> $request->email,
                'password'=>$request->password,
            ];
            
            if (Auth::attempt($infologin)){
                if(Auth::user()->role == "admin"){
                    return redirect()->route('admin.index');
                }else if (Auth::user()->role == "customer"){
                    return redirect()->route('customer.index');
                
                }else if (Auth::user()->role == "bank"){
                    return redirect()->route('bank.index');
                
                }else if (Auth::user()->role == "kantin"){
                    return redirect()->route('kantin.index');
                }
            }else{
                return redirect(route('tampilan'))->withErrors('Email dan password yang salah')->withInput();
            }

          
    }
    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ]);
        $inforegister=[
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
           
        ];
        //membuat inforegister user
        $dataregis = User::create($inforegister);
        $rekening = '64' . auth()->id() . now()->format('YmdHis');
        $userwallet = Wallet::create([
            'rekening' => $rekening,
            'id_user'=> $dataregis->id,
            'saldo'=> 0,
            'status'=>'aktif',
        ]);
        


        return redirect()->route('tampilan')->with('success', 'Berhasi registrasi');
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
