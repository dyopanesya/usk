<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $dataUser =[
    //    [
    //     'name'=> 'admin',
    //     'email'=> 'admin@gmail.com',
    //     'role'=> 'admin',
    //     'password'=> bcrypt ('admin'),
    //     'email_Verified_at'=> now(),
    //     'remember_token'=> str::random(10),

    //    ],
       [
        'name'=> 'bank',
        'email'=> 'bank@gmail.com',
        'role'=> 'bank',
        'password'=> bcrypt ('bank'),
        'email_Verified_at'=> now(),
        'remember_token'=> str::random(10),

       ],
       [
        'name'=> 'kantin',
        'email'=> 'kantin@gmail.com',
        'role'=> 'kantin',
        'password'=> bcrypt ('kantin'),
        'email_Verified_at'=> now(),
        'remember_token'=> str::random(10),

       ],
       [
        'name'=> 'customer',
        'email'=> 'customer@gmail.com',
        'role'=> 'customer',
        'password'=> bcrypt ('customer'),
        'email_Verified_at'=> now(),
        'remember_token'=> str::random(10),

       ],
    ];
    foreach ($dataUser as $key =>$val) {
        User::create($val);
    }
    $dataKategori = [
        [
            'nama_kategori'=> 'Makanan',
        ],
        [
            'nama_kategori'=> 'Minuman',
        ],
    ];
    foreach ($dataKategori as $key =>$val) {
        Kategori::create($val);
    }
    $dataProduk =[
        [
            'nama_produk'=>'vit',
            'harga'=> 3000,
            'stok' => 10,
            'foto'=>'default.png',
            'desc'=> 'minuman air mineral saingan Aqua',
            'id_kategori'=> 1,
        ],
        [
            'nama_produk'=>'Mie Aayam',
            'harga'=> 10000,
            'stok' => 10,
            'foto'=>'default.png',
            'desc'=> 'mie pake ayam',
            'id_kategori'=> 2,

        ],
  ];
  foreach ($dataProduk as $key =>$val) {
    Produk::create($val);
}
  $dataWallet =[
        [
            'rekening' => '641234567890',
            'id_user'=>1,
            'saldo'=>100000,
            'status'=>'aktif'
        ],
        [
            'rekening' => '640987654321',
            'id_user'=>2,
            'saldo'=>100000,
            'status'=>'aktif'
        ],
        [
            'rekening' => '641212343456',
            'id_user'=>3,
            'saldo'=>100000,
            'status'=>'aktif'
        ],
        [
            'rekening' => '640909878765',
            'id_user'=>4,
            'saldo'=>100000,
            'status'=>'aktif'
        ],

    ];
    foreach ($dataWallet as $key =>$val) {
        Wallet::create($val);
    }
    }
}

